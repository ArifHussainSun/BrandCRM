<?php

namespace App\Http\Controllers;

use App\Classes\SmtpConfig;
use App\Mail\ReportEmail;
use App\Models\BrandSettings;
use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\Categories;
use Illuminate\Support\Facades\Session;
use App\Models\PaymentSaleTypeModel;
use App\Models\PaymentLink;
use App\Models\CountryCurrencies;
use App\Models\EmailTemplate;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use App\Traits\ApplicationTrait;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class PaymentsController extends Controller
{
    use ApplicationTrait;

    function __construct()
    {
        $this->middleware('permission:Payment-Create|Payment-Edit|Payment-View|Payment-Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Payment-Create', ['only' => ['form', 'store']]);
        $this->middleware('permission:Payment-Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Payment-Delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->Roles->first()->name;

        if ($request->ajax()) {
            if($role=="Salesperson"){
                $payments = Payments::where('created_by', $user->id)->get();
            } else{
                $payments = Payments::all();
            }
            
            return DataTables::of($payments)
                ->addColumn('customer_name', function ($row) {
                $customer = User::where('id',$row->customer_id)->first();
                    return $customer->first_name . " " . $customer->last_name;
                })
                ->addColumn('customer_email', function ($row) {
                    $customer = User::where('id',$row->customer_id)->first();

                    $html = '<span class="badge bg-primary btn-view" style="font-size: smaller;" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'">'.$customer->email.'</span>';
                    return $html;
                    })
                ->addColumn('price', function ($row) {
                $currency = CountryCurrencies::find($row->currency);
                    return $currency->currency_symbol . " " . $row->price;
                })
                ->addColumn('category', function ($row) {
                    $category_id = Categories::find($row->category_id)->first();

                    return $category_id->name;
                })
                ->addColumn('payment_gateway', function ($row) {
                    $gateway_name = str_replace("payment_gateway_", "", $row->payment_gateway);
                    $gateway_name = str_replace("_", " ", $gateway_name);
                    $gateway_name = Str::upper($gateway_name);
                    return $gateway_name;
                })
                ->addColumn('sale_type', function ($row) {
                    $sale_type = PaymentSaleTypeModel::find($row->sale_type_id)->first();

                    return $sale_type->name;
                })

                ->addColumn('created_at', function ($row) {
                    return date('d-M-Y', strtotime($row->created_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->created_at)->diffForHumans() . '</label>';
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $status = array('text' => 'Paid', 'badge' => 'success',);
                    }
                    else {
                        $status = array('text' => 'Declined', 'badge' => 'danger',);

                    }

                    $html = '<span class="bg-' . $status["badge"] . ' badge me-2">' . $status["text"] . '</span>';
                    return $html;
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="payment_status" switch="bool" data-id="' . $row->id . '" value="'.($row->status==1 ? "1" : "0").'" '.($row->status==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    //$html = '<a href="#"  class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'"><i class="far fa-eye"></i></a>&nbsp' ;
                    $html = '' ;
                    if (Auth::user()->can('Payment-Edit')) {
                        $html .= '<a href="'.route('payment.edit',$row->id).'"  class="btn btn-success btn-edit" ><i class="fas fa-edit"></i></a>&nbsp' ;
                        // $html .= '<a href="'.route('payments.fetchdata',$row->id).'" style="background-color: #008CBA;color:white"  class="btn btn-default btn-detail"><i class="fas fa-arrow-right"></i></a>&nbsp' ;
                    }
                    if (Auth::user()->can('Payment-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    $emailtemplate = EmailTemplate::where('name','Billing')->first();
                    if (($row->status == 1)&&(!empty($emailtemplate->content))) {
                        $html .= '<a href="'.route('payment.download.invoice',['id'=>$row->id,'download'=>'pdf']).'" class="btn btn-warning btn-download" data-id="'.$row->id.'"><i class="fas fa-download"></i></a>&nbsp' ;
                        //$html .= '<a href="#" class="btn btn-success btn-send" data-id="'.$row->id.'"><i class="fas fa-arrow-circle-right"></i></a>&nbsp' ;

                    }
                    return $html;
                })
                ->rawColumns(['customer_email', 'action', 'status','created_at'])->make(true);
        }

        return view('admin.payments.list');
    }

    public function trashed(Request $request)
    {
        $user = Auth::user();
        $role = $user->Roles->first()->name;

        if ($request->ajax()) {
            if($role=="Salesperson"){
                $payments = Payments::where('created_by', $user->id)->onlyTrashed()->get();
            } else{
                $payments = Payments::onlyTrashed();
            }
            
            return DataTables::of($payments)
            ->addColumn('customer_name', function ($row) {
                $customer = User::where('id',$row->customer_id)->first();
                    return $customer->first_name . " " . $customer->last_name;
                })
                ->addColumn('customer_email', function ($row) {
                    $customer = User::where('id',$row->customer_id)->first();
                        return $customer->email;
                    })
                ->addColumn('price', function ($row) {
                $currency = CountryCurrencies::find($row->currency);
                    return $currency->currency_symbol . " " . $row->price;
                })
                ->addColumn('category', function ($row) {
                    $category_id = Categories::find($row->category_id)->first();

                    return $category_id->name;
                })
                ->addColumn('payment_gateway', function ($row) {
                    $gateway_name = str_replace("payment_gateway_", "", $row->payment_gateway);
                    $gateway_name = str_replace("_", " ", $gateway_name);
                    $gateway_name = Str::upper($gateway_name);
                    return $gateway_name;
                })
                ->addColumn('sale_type', function ($row) {
                    $sale_type = PaymentSaleTypeModel::find($row->sale_type_id)->first();

                    return $sale_type->name;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $status = array('text' => 'Paid', 'badge' => 'success',);
                    }
                    else {
                        $status = array('text' => 'Declined', 'badge' => 'danger',);

                    }

                    $html = '<span class="bg-' . $status["badge"] . ' badge me-2">' . $status["text"] . '</span>';
                    return $html;
                    $btn = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="payment_status" switch="bool" data-id="' . $row->id . '" value="'.($row->status==1 ? "1" : "0").'" '.($row->status==1 ? "checked" : "").'/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';

                    return $btn;
                })
                ->addColumn('deleted_at', function ($row) {
                    return date('d-M-Y', strtotime($row->deleted_at)) . '<br /> <label class="text-primary">' . Carbon::parse($row->deleted_at)->diffForHumans() . '</label>';
                })
                ->addColumn('action', function ($row) {
                    $html = '<a href="#"  class="btn btn-primary btn-view" data-bs-toggle="modal" data-bs-target=".orderdetailsModal" data-id="'.$row->id.'"><i class="far fa-eye"></i></a>&nbsp' ;
                    if (Auth::user()->can('Payment-Edit')) {
                        $html .= '<a href="'.route('payment.restore',$row->id).'"  class="btn btn-xs btn-success btn-restore" ><i class="mdi mdi-delete-restore"></i></a>&nbsp' ;
                    }
                    if (Auth::user()->can('Payment-Delete')) {
                        $html .= '<button data-id="' . $row->id . '" id="sa-params" class="btn btn-xs  btn-danger btn-delete" ><i class="far fa-trash-alt"></i></button>&nbsp';
                    }
                    return $html;
                })
                ->rawColumns(['action', 'status','deleted_at'])->make(true);

            }
            return view('admin.payments.trashed');
    }

    public function form()
    {
        $customer = User::role('Customer')->get();
        $currency = CountryCurrencies::all();
        $categories = Categories::all();
        $saletypes = PaymentSaleTypeModel::all();
        $emailtemplate = EmailTemplate::where('name','Billing')->first();
        $paymentGateways = BrandSettings::where('key_name', 'like', '%payment_gateway_%')->get();
        $defaultCurrency = BrandSettings::where('key_name', 'like', '%default_currency%')->first();
        $defaultPaymentGateway = BrandSettings::where('key_name', 'like', '%default_payment_gateway%')->first();

        return view('admin.payments.add', compact('customer', 'currency', 'categories', 'saletypes', 'paymentGateways', 'emailtemplate', 'defaultCurrency', 'defaultPaymentGateway'));
    }

    function status(Request $request, $id,$isType=null) {

        $payments = Payments::find($id);
        $payments->status = (($request->status == "true") ? 1 : 0);

        $response = array();

        if($payments->save()) {
            $response["success"] = true;
            $response["message"] = "Payment Status Updated Successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Failed to Update Payment Status!";
        }

        return response()->json($response);
    }

    public function storeOrUpdate(Request $request)
    {
        $valid =  $request->validate([
          'customer_id' => 'required',
          'item_name' => 'required',
          'valid_till' => 'nullable',
          'price' => 'required',
          'discount' => 'nullable',
          'discount_type' => 'nullable',
          'item_description' => 'nullable',
          'converted_amount' => 'nullable',
          'currency' => 'nullable',
          'category_id' => 'nullable',
          'sale_type_id ' => 'nullable',
          'payment_type' => 'nullable',
          'balance' => 'nullable',
          'comment' => 'nullable',
          'coupon_id' => 'nullable',
          'payment_gateway' => 'required',
          'remaining_amount' => 'nullable',
          'message' => 'nullable',
          'email_sent' => 'nullable',
        ]);
    
        if ($valid) {
            $current_date_time = Carbon::now()->toDateTimeString();
            $request["token"] = sha1(uniqid($current_date_time, true));

    
            $payments = Payments::findOrNew($request->id);
            $isNewPayments = $payments->id == null;
            $isNewPaymentlink = empty($payments->token);
            $paymentlink = $isNewPaymentlink ? new PaymentLink() : PaymentLink::where('token',$payments->token)->first();
            
    
            $payments->customer_id = $request->customer_id;
            $paymentlink->customer_id = $request->customer_id;

            if(($request->filled('discount')) && ($request->discount!=$payments->discount) || ($request->price!=$payments->price)) {
                $discounted_price = $this->discountAccType($request->discount_type, $request->discount, $request->price);
                $payments->original_price = $request->price;
                $paymentlink->original_price = $request->price;
            } else {
                $discounted_price = $this->discountAccType('flat', 0, $request->price);
            }

            $payments->item_name = $request->item_name;
            $payments->price = $discounted_price;
            $payments->discount = $request->discount;
            $payments->discount_type = $request->discount_type;
            $payments->item_description = $request->item_description;
            $payments->converted_amount = $request->converted_amount;
            $payments->currency = $request->currency;
            $payments->category_id = $request->category_id;
            $payments->sale_type_id = $request->sale_type_id;
            $payments->payment_type = $request->payment_type;
            $payments->balance = $request->balance;
            $payments->comment = $request->comment;
            $payments->coupon_id = $request->coupon_id;
            $payments->payment_gateway = $request->payment_gateway;
            $payments->remaining_amount = $request->remaining_amount;
            $payments->message = $request->message;
           

            $paymentlink->item_name = $request->item_name;
            $paymentlink->price = $discounted_price;
            $paymentlink->discount = $request->discount;
            $paymentlink->discount_type = $request->discount_type;
            $paymentlink->item_description = $request->item_description;
            $paymentlink->sale_type_id = $request->sale_type_id;
            $paymentlink->currency = $request->currency;
            $paymentlink->comment = $request->comment;
            $paymentlink->category_id = $request->category_id;
            $paymentlink->payment_type = $request->payment_type;
            $paymentlink->payment_gateway = $request->payment_gateway;
            
    
            $management = User::role(['Admin', 'Brand Manager'])->get();
            $management->pluck('id');
            $data = array(
                "success" => true,
                "message" => $isNewPayments ? "Payment Added Successfully" : "Payment Updated Successfully"
            );
    
            // Set the created_by and updated_by values
            $user_id = Auth::user()->id;
            if ($isNewPayments) {
                $payments->token = $request->token;
                $payments->valid_till = Carbon::now()->addHours(48)->timestamp;
                $payments->created_by = $user_id;
                $paymentlink->token = $request->token;
                $paymentlink->valid_till = Carbon::now()->addHours(48)->timestamp;
                $paymentlink->created_by = $user_id;
            } else {
                $payments->updated_by = $user_id;
                $paymentlink->updated_by = $user_id;
            }
            $paymentlink->save();
            if ($payments->save()) {
                $this->paymentLinkStatus($paymentlink->id, 2 );
                if ($isNewPayments) {
                $payment_id = $payments->id;
                InvoiceController::create($payment_id, $request->email_sent);
                }
                // Call the touch() method to update the updated_at field
                $payments->touch();
                $paymentlink->touch();
                $notifyKey = $isNewPayments ? 'added' : 'updated';
                $notify = array(
                    "performed_by" => $user_id,
                    "title" => $isNewPayments ? "Added New Payment" : "Payment Updated Successfully",
                    "desc" => array(
                        $notifyKey.'_title' => $request->input('item_name'),
                        $notifyKey.'_description' => $request->item_description,
                    )
                );
                Notification::send($management, new QuickNotify($notify));
                Session::flash('success', $data["message"]);
            } else {
                $data["success"] = false;
                $data["message"] = $isNewPayments ? "Payment Not Added Successfully." : "Payment Not Updated Successfully.";
                Session::flash('error', $data["message"]);
            }
    
            return redirect()->route('payment.list')->with($data);
        } else {
            return redirect()->back();
        }
    }
    
    public function restore(Request $request, $id)
    {
        $payments = Payments::onlyTrashed()->findOrFail($id);
        $success = $payments->restore();

        $response = [
            "success" => $success,
            "message" => $success ? "Payment Restored Successfully!" : "Failed to Restore Payment!"
        ];
        return redirect()->route('payment.list')->with($response);
    }

    public function edit(Request $request ,$id)
    {
        $customer = User::role('Customer')->get();
        $currency = CountryCurrencies::all();
        $categories = Categories::all();
        $saletypes = PaymentSaleTypeModel::all();
        $paymentlink = PaymentLink::all();
        $where = array('id' => $id);
        $payments  = Payments::where($where)->first();
        $emailtemplate = EmailTemplate::where('name','Billing')->first();
        $invoice_details = Invoice::where('payment_id',$id)->first();
        $paymentGateways = BrandSettings::where('key_name', 'like', '%payment_gateway_%')->get();

        return view('admin.payments.edit',compact('customer','currency','categories','saletypes','paymentlink','payments', 'paymentGateways', 'invoice_details', 'emailtemplate'));
    }

    public function view(Request $request,$isTrashed=null)
    {
        $customer = User::role('Customer')->get();
        $currency = CountryCurrencies::all();
        $categories = Categories::all();
        $saletypeies = PaymentSaleTypeModel::all();
        $payment_typies = PaymentLink::all();
        $where = array('id' => $request->id);
        if($isTrashed != null && $isTrashed == 1 ) {

            $payments  = Payments::onlyTrashed()->where($where)->with('customer','category','currency','saleType','invoice')->first();
            $payments['customer'] = $customer;
            $payments['currency'] = $currency;
            $payments['categories'] = $categories;
            $payments['saletypeies'] = $saletypeies;
            $payments['payment_typies'] = $payment_typies;

        } else{

            $payments  = Payments::where($where)->with('customer','category','currency','saleType','invoice')->first();
            $payments['customer'] = $customer;
            $payments['currency'] = $currency;
            $payments['categories'] = $categories;
            $payments['saletypeies'] = $saletypeies;
            $payments['payment_typies'] = $payment_typies;

        }

        return Response()->json($payments);
    }

    public function delete(Request $request)
    {
        $payments = Payments::find($request->id);
        $success = $payments->delete();

        return response()->json([
            "success" => $success,
            "message" => $success ? "Payment Deleted Successfully!" : "Failed to Delete Payment!"
        ]);
    }

    public function destroy(Request $request)
    {
        $payments = Payments::onlyTrashed()->find($request->id);
        $success = $payments->forceDelete();
        $response = [
            "success" => $success,
            "message" => $payments->trashed() ? "Payment Destroy Successfully!" : "Failed to Destroy Payment!"
        ];

        return response()->json($response);
    }

    public function downloadInvoice(Request $request)
    {
        $payment_info = Payments::where('id',$request->id)->first()->toArray();

        $brandSettings = (new InvoiceController)->get_setting()->toArray();
        $user_invoice = Invoice::where('payment_id',$request->id)->latest('id')->first()->toArray();
        $customer_info = User::find($payment_info['customer_id'])->toArray();
        $category_info = Categories::find($payment_info['category_id'])->toArray();
        $currency_info = CountryCurrencies::find($payment_info['currency'])->toArray();
        $createdAt = Carbon::parse($user_invoice['created_at']);
        $invoice_date = array('invoice_date' => $createdAt->format('d M Y') );
        $invoice_info = array_merge($brandSettings, $user_invoice, $customer_info, $payment_info, $category_info, $invoice_date, $currency_info);
        try {
        $emailTemplate = EmailTemplate::where('name','Billing')->first();
        $parseHTML = Blade::render($emailTemplate->content, $invoice_info);
        $downloadPdf = $this->pdf = PDF::loadHtml($parseHTML);

        return $downloadPdf->download($user_invoice['invoice_no'].".pdf");
        } catch(Throwable $e) {
          return  $e->getMessage();
        }
        
    }

    public function generateReport()
    {
        $invoices = Invoice::whereDate('created_at', Carbon::today())->with('payment','customer')->get();
        $brandSettings = (new InvoiceController)->get_setting()->toArray();
        $from = head($invoices->toArray());
        $to = Arr::last($invoices->toArray(), function ($value, $key) {
            return $value ;
        });

        return view('admin.payments.report',compact('invoices', 'from', 'to', 'brandSettings'));
    }

    protected function discountAccType($discount_type, $discount, $itemprice)
    {
        $discounted_price = 0;
        $discount = floatval($discount);
        $itemprice = floatval($itemprice);

        if ($discount_type == "flat") {
            $discounted_price = $itemprice - $discount;
        } else if ($discount_type == "percent") {
            $discounted_price = $itemprice - ceil(($itemprice * ($discount / 100)));
        }

        return $discounted_price;
    }

    public static function generateReportviaEmail()
    {
        $invoices = Invoice::whereDate('created_at', Carbon::today())->with('payment','customer')->get();
        $brandSettings = (new InvoiceController)->get_setting()->toArray();
        $from = head($invoices->toArray());
        $to = Arr::last($invoices->toArray(), function ($value, $key) {
            return $value ;
        });
        $reportinfo = array('invoices' => $invoices,'from' => $from,'to' => $to,'brandSettings' => $brandSettings );
        $setSMTP = new SmtpConfig('general');
        
        $mailInvoice = Mail::to($brandSettings['company_email']);
        $mailInvoice->send(new ReportEmail($reportinfo));
       
        
    }

    public function sendInvoice(Request $request)
    {    
        try {
         
            InvoiceController::payment_email_send($request['id']);

            $response = array(
                "success" => true,
                "message" => "Email Send Successfully!"
            );
            return response()->json($response);
            } catch(Throwable $e) {
              return  $e->getMessage();
            }
       
    }

    protected function paymentLinkStatus($paymentLink_id, $status) {
        $paymentLink = PaymentLink::find($paymentLink_id);
        $paymentLink->status = $status;

        if($paymentLink->save()) {
            return true;
        } else {
            return false;
        }
    }
    
}