<?php
namespace App\Traits;

use App\Models\Categories;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\CountryCurrencies;
use Illuminate\Http\Response;

use Illuminate\Http\Request;


trait PackagingTrait {



    public function get_product_bundle()
    {
      $data['products'] = Product::with('category','countrycurrency','Subcategory')->get();
      $data['categories'] = Categories::with('product','product_Bundle')->get();


      return $data;
    }
    public static  function Product_bundle_discount($discount_type, $products_discount, $amount)
    {
        if($discount_type == "flat"){
            $discounted_amount =  floatval($amount - $products_discount);
        }else {
            $discounted_amount = floatval($amount/100 * $products_discount);
            // $discounted_amount = floatval($amount - $discount_amount);
        }
        return floatval($discounted_amount);
    }

    public function Pricing_add_Token(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $request["token"] = sha1(uniqid($current_date_time, true));
        $valid =  $request->validate([
            'item_name' => 'required|string',
            'item_price' => 'required|numeric',
            'discount' => 'required',
            'currency' => 'required',
            'token' => 'unique:link_generators,token',
            'item_description' => 'nullable',
            'discount' => 'nullable',
            'discount_type' => 'nullable',
            'payment_gateway' => 'required',
        ]);

        if($valid) {
            $linkgenerator = new LinkGenerator;
            $linkgenerator->item_name = $request->item_name;
            $linkgenerator->item_price = $request->item_price;
            $linkgenerator->discount = $request->discount;
            $linkgenerator->currency = $request->currency;
            $linkgenerator->item_description = $request->item_description;
            $linkgenerator->item_category = $request->item_category;
            $linkgenerator->payment_gateway = $request->payment_gateway;
            $linkgenerator->token = $request->token;
            $linkgenerator->save();

            //$Link_Generator_Token = LinkGenerator::latest()->first();
            //   $Link_Generator_Token = LinkGenerator::whereBetween('created_at', [now()->subMinutes(1440), now()])->get();
            $insertedId = $linkgenerator->token;

            return ["status" => true, "token"=> $linkgenerator->token];
          } else {
            return ["status" => false, "message" => "Token not validated"];
          }

    }



}