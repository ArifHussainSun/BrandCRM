<?php

namespace App\Http\Controllers;

use App\Models\PaymentLink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentLinkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentLinks = PaymentLink::select('id', 'customer_id', 'token', 'valid_till', 'item_name', 'price', 'discount_type', 'discount', 'original_price', 'item_description', 'currency', 'category_id', 'coupon_id', 'sale_type_id', 'payment_gateway', 'payment_type', 'comment', 'created_by')->get();

        return [
            "status" => true,
            "data" => $paymentLinks
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $request["token"] = sha1(uniqid($current_date_time, true));
        $user = User::role('Developer')->latest('id')->first();

        $validator = Validator::make($request->all(), [
            'customer_id' => 'nullable',
            'sale_type_id' => 'required',
            'token' => 'unique:payment_links,token',
            'item_name' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'discount_type' => 'nullable',
            'item_description' => 'nullable',
            'currency' => 'required',
            'category_id' => 'required',
            'coupon_id' => 'nullable',
            'payment_type' => 'required',
            'payment_gateway' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            $errors = $validator->errors();

            return [
                'status' => false,
                'message' => $message,
                "errors" => $errors
            ];
        } else {
            $paymentlink = new PaymentLink();

            if ($request->filled('customer_id')) {
                $paymentlink->customer_id = $request->customer_id;
            }

            if ($request->filled('discount')) {
                $discounted_price = $this->discountAccType($request->discount_type, $request->discount, $request->price);
            } else {
                $discounted_price = $this->discountAccType('flat', 0, $request->price);
            }

            $paymentlink->valid_till = Carbon::now()->addHours(48)->timestamp;
            $paymentlink->item_name = $request->item_name;
            $paymentlink->price = $discounted_price;
            $paymentlink->original_price = $request->price;
            $paymentlink->discount = $request->discount;
            $paymentlink->discount_type = $request->discount_type;
            $paymentlink->item_description = $request->item_description;
            $paymentlink->sale_type_id = $request->sale_type_id;
            $paymentlink->currency = $request->currency;
            $paymentlink->comment = $request->comment;
            $paymentlink->category_id = $request->category_id;
            $paymentlink->payment_type = $request->payment_type;
            $paymentlink->token = $request->token;
            $paymentlink->payment_gateway = $request->payment_gateway;
            $paymentlink->created_by = $user->id;
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');

            $data = array(
                "success" => true,
                "data" => $paymentlink,
                "message" => "Payment Link Generator Added Successfully."
            );

            if ($paymentlink->save()) {
                $notify = array(
                    "performed_by" => $user->id,
                    "title" => "Added New Payment Link Generator",
                    "desc" => array(
                        "added_title" => $request->input('item_name'),
                        "added_description" => $request->item_description,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = "Payment Link Generator Not Added Successfully.";

                Session::flash('error', $data["message"]);
            }

            return [
                "status" => true,
                "data" => $paymentlink,
                "message" => "Payment Link Added Successfully."
            ];
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\PaymentLink  $paymentlink
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentLink $paymentlink)
    {
        return [
            "status" => true,
            "data" => $paymentlink
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLink $paymentLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentLink  $paymentlink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLink $paymentlink)
    {
        $user = User::role('Developer')->latest('id')->first();

        $validator = Validator::make($request->all(), [
            'customer_id' => 'nullable',
            'sale_type_id' => 'required',
            'item_name' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'discount_type' => 'nullable',
            'item_description' => 'nullable',
            'currency' => 'required',
            'category_id' => 'required',
            'coupon_id' => 'nullable',
            'payment_type' => 'required',
            'payment_gateway' => 'required',

        ]);

        if ($validator->fails()) {

            $message = $validator->errors()->first();
            $errors = $validator->errors();

            return [
                'status' => false,
                'message' => $message,
                "errors" => $errors
            ];
        } else {

            if ($request->filled('customer_id')) {
                $paymentlink->customer_id = $request->customer_id;
            }

            if (($request->filled('discount'))) {
                if (($request->discount != $paymentlink->discount) && ($request->price == $paymentlink->price)) {
                    $discounted_price = $this->discountAccType($request->discount_type, $request->discount, $request->price);
                }
                if (($request->discount == $paymentlink->discount) && ($request->price != $paymentlink->price)) {
                    $discounted_price = $this->discountAccType($request->discount_type, $request->discount, $request->price);
                }
                if (($request->discount == $paymentlink->discount) && ($request->price == $paymentlink->price)) {
                    $discounted_price = $this->discountAccType($request->discount_type, $request->discount, $request->price);
                }
                if (($request->discount != $paymentlink->discount) && ($request->price != $paymentlink->price)) {
                    $discounted_price = $this->discountAccType($request->discount_type, $request->discount, $request->price);
                }
            } else {
                $discounted_price = $this->discountAccType('flat', 0, $request->price);
            }

            $paymentlink->item_name = $request->item_name;
            $paymentlink->price = $discounted_price;
            $paymentlink->original_price = $request->price;
            $paymentlink->discount = $request->discount;
            $paymentlink->discount_type = $request->discount_type;
            $paymentlink->item_description = $request->item_description;
            $paymentlink->sale_type_id = $request->sale_type_id;
            $paymentlink->currency = $request->currency;
            $paymentlink->comment = $request->comment;
            $paymentlink->category_id = $request->category_id;
            $paymentlink->payment_type = $request->payment_type;
            $paymentlink->payment_gateway = $request->payment_gateway;
            $paymentlink->updated_by = $user->id;
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => "Payment Link Generator Updated Successfully."
            );

            if ($paymentlink->update()) {
                $notify = array(
                    "performed_by" => $user->id,
                    "title" => "Updated Payment Link Generator",
                    "desc" => array(
                        "updated_title" => $request->input('item_name'),
                        "updated_description" => $request->item_description,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = "Payment Link Generator Not Updated Successfully.";

                Session::flash('error', $data["message"]);
            }

            return [
                "status" => true,
                "data" => $paymentlink,
                "message" => "Payment Link Updated Successfully"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLink $paymentlink)
    {
        $paymentlink->delete();
        return [
            "status" => true,
            "data" => $paymentlink,
            "message" => "Payment Link Deleted Successfully"
        ];
    }

    protected function discountAccType($discount_type, $discount, $itemprice)
    {
        $discounted_price = 0;
        $discount = floatval($discount);
        $itemprice = floatval($itemprice);

        if ($discount_type == "flat") {
            $discounted_price = $itemprice - $discount;
        } else if ($discount_type == "percent") {
            $discounted_price = ceil($itemprice - ($itemprice * ($discount / 100)));
        }

        return $discounted_price;
    }
}
