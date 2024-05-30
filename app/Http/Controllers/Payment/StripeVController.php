<?php

namespace App\Http\Controllers\Payment;

use App\Providers\SmtpSettingProvider;
use App\Http\Controllers\Controller;
use App\Mail\InvoiceEmail;
use App\Models\BrandSettings;
use App\Models\CountryCurrencies;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentLink;
use App\Models\Payments;
use App\Models\User;
use App\Traits\ApplicationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Exception, Session, Stripe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class StripeVController extends Controller
{
    use ApplicationTrait;

    public $public_key;
    public $secret_key;
    public $statement_descriptor;
    public $environment;
    
    public function index(Request $request) {
        $item_detail = PaymentLink::where("token", "=", $request->token)->first();
        $country_currency = CountryCurrencies::find($item_detail->currency);
        $gateway_setting = BrandSettings::where("key_name", "=", $item_detail->payment_gateway)->first();
        $payment_gateway = json_decode($gateway_setting->key_value);
        
        $this->public_key = $payment_gateway->public_key;
        $this->secret_key = $payment_gateway->secret_key;
        $this->statement_descriptor = $payment_gateway->statement_descriptor;
        $this->environment = $payment_gateway->environment;

        Session()->put('payment_gateway', $payment_gateway);

        $countries = CountryCurrencies::orderBy('country_name', 'ASC')->get();

        //return view('frontend.payments.payment_page', compact('item_detail', 'countries', 'payment_gateway','country_currency'));
        return view('frontend.payments.stripe');
    }

    public function three_step(Request $request) {
        $item_detail = PaymentLink::where("token", "=", $request->token)->first();

        $country_currency = CountryCurrencies::find($item_detail->currency);
        $gateway_setting = BrandSettings::where("key_name", "=", $item_detail->payment_gateway)->first();
        $payment_gateway = json_decode($gateway_setting->key_value);
        
        $this->public_key = $payment_gateway->public_key;
        $this->secret_key = $payment_gateway->secret_key;
        $this->statement_descriptor = $payment_gateway->statement_descriptor;
        $this->environment = $payment_gateway->environment;

        Session()->put('payment_gateway', $payment_gateway);

        $countries = CountryCurrencies::orderBy('country_name', 'ASC')->get();

        return view('frontend.payments.three_step', compact('item_detail', 'countries', 'payment_gateway','country_currency'));
        
    }

    public function createPaymentMethod(Request $request) {
        $formData = Arr::pluck($request->all(), 'value', 'name');
    
        $now = Carbon::now();
        $currentMonth = $now->month;
        $currentYear = $now->year;
        
        $rules =  [
            'firstname' => 'required',
            'lastname' => 'required',
            'clientemail' => ['required', 'email'],
            'phonenum' => 'required',
            'address' => 'required',
            'companyname' => 'required',
            'country' => 'required',
            'statename' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'cardNo' => 'required',
            'month' => ['required', 'digits:2'],
            'year' => [
                        'required', 'digits:4', 
                            function ($attribute, $value, $fail) use ($currentYear) {
                                if ($value < $currentYear) {
                                    $fail('Card expired.');
                                }
                            },
            ],
            'cvc' => ['required', 'min:3', 'max:4'],
        ];

        $cardCustomMessages = [
            'cardNo.required' => 'Valid Card number is required.',
            'month.required' => 'Month required.',
            'year.required' => 'Year required.',
            'cvc.required' => 'CVC required.',
            'month.digits' => 'Valid 2 digits.',
            'year.digits' => 'Valid 4 digits.',
        ];
    
        $validator = Validator::make( $formData, $rules, $cardCustomMessages );

        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();

            return response()->json([
                "validation_errors" => $errors
            ]);
        }
        
        if($validator->validated()) { 
            $this->paymentSetting();
            
            try {
                $original_price = $formData['itemprice'];
                $currency = (!empty($formData['currency']) ? $formData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                $formData["brand_descriptor"] = $this->statement_descriptor;
                
                $stripe = Stripe\Stripe::setApiKey($this->secret_key);

                $customer = $this->createCustomer($formData);

                $payment_method = \Stripe\PaymentMethod::create([
                    "billing_details" => [
                        "email" => $formData["clientemail"],
                        "name"=> $formData["firstname"]. " ".$formData["lastname"],
                    ],
                    'type' => 'card',
                    'card' => [
                    'number' => $formData["cardNo"],
                    'exp_month' => $formData["month"],
                    'exp_year' => $formData["year"],
                    'cvc' => $formData["cvc"],
                    ],
                ]);

                $payment_method->attach([
                    ['customer' => $customer->id]
                ]);

                # Create the PaymentIntent
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $payment_method->id,
                    'amount' => $converted_amount * 100,
                    'currency' => $currency,
                    'confirmation_method' => 'manual',
                    "customer" => $customer->id,
                    'confirm' => true,
                    'statement_descriptor' => $this->statement_descriptor,
                    'description' => $formData['itemname'],
                    'metadata' => $formData,
                ]);
                
                return $this->generatePaymentResponse($intent);

            } catch (\Stripe\Exception\AuthenticationException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\CardException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\RateLimitException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\ApiConnectionException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (Exception $e) {
                return response()->json([ 'error' => $e->getMessage()]);
            }
        }
    }

    public function createThreeStepPaymentMethod(Request $request) {
        $formData = Arr::pluck($request->all(), 'value', 'name');
    
        $now = Carbon::now();
        $currentMonth = $now->month;
        $currentYear = $now->year;
        
        $rules =  [
            'firstname' => 'required',
            'lastname' => 'required',
            'clientemail' => ['required', 'email'],
            'phonenum' => 'required',
            'address' => 'required',
            'companyname' => 'required',
            'country' => 'required',
            'statename' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'cardNo' => 'required',
            'month' => ['required', 'digits:2'],
            'year' => [
                            'required', 'digits:4', 
                                function ($attribute, $value, $fail) use ($currentYear) {
                                    if ($value < $currentYear) {
                                        $fail('Card expired.');
                                    }
                                },
            ],
            'cvc' => ['required', 'min:3', 'max:4'],
        ];

        $cardCustomMessages = [
            'cardNo.required' => 'Valid Card number is required.',
            'month.required' => 'Month required.',
            'year.required' => 'Year required.',
            'cvc.required' => 'CVC required.',
            'month.digits' => 'Valid 2 digits.',
            'year.digits' => 'Valid 4 digits.',
        ];
    
        $validator = Validator::make( $formData, $rules, $cardCustomMessages );

        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();

            return response()->json([
                "validation_errors" => $errors
            ]);
        }
        
        if($validator->validated()) { 
            $this->paymentSetting();
            
            try {
                $original_price = $formData['itemprice'];
                $currency = (!empty($formData['currency']) ? $formData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                // 1st transaction
                //$amount = $converted_amount - 1.4;
                $amount = $converted_amount - 1;
                // 2nd transaction
                //$rand = floatVal('0.'.rand(60, 90));
                $rand = 0.5;
                // 3rd transaction
                //$rand2 = $converted_amount - ($amount + $rand);
                $rand2 = 0.5;

                $formData["brand_descriptor"] = $this->statement_descriptor;
                
                $stripe = Stripe\Stripe::setApiKey($this->secret_key);

                $customer = $this->createCustomer($formData);

                $payment_method = \Stripe\PaymentMethod::create([
                    "billing_details" => [
                        "email" => $formData["clientemail"],
                        "name"=> $formData["firstname"]. " ".$formData["lastname"],
                    ],
                    'type' => 'card',
                    'card' => [
                    'number' => $formData["cardNo"],
                    'exp_month' => $formData["month"],
                    'exp_year' => $formData["year"],
                    'cvc' => $formData["cvc"],
                    ],
                ]);

                $payment_method->attach([
                    ['customer' => $customer->id]
                ]);

                # Create the PaymentIntent
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $payment_method->id,
                    'amount' => $amount * 100,
                    'currency' => $currency,
                    'confirmation_method' => 'manual',
                    "customer" => $customer->id,
                    'confirm' => true,
                    'statement_descriptor' => $this->statement_descriptor,
                    'description' => $formData['itemname'],
                    'metadata' => $formData,
                ]);
                
              return response()->json($intent);

            } catch (\Stripe\Exception\AuthenticationException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\CardException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\RateLimitException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\ApiConnectionException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'code' => $e->getError()->code,
                ]);
            } catch (Exception $e) {
                return response()->json([ 'error' => $e->getMessage()]);
            }
        }
    }
    public function PaymentIntent_succeeded(Request $request){
        $this->paymentSetting();
        $json_obj = $request->all();
        $customerData = Arr::pluck($request->paymentData, 'value', 'name');
        $intent = null;     

        try {
            if (isset($json_obj['payment_method_id'])) {
                if (isset($customerData['item_desc'])) {
                    unset($customerData['item_desc']);
                }

                if (isset($customerData['payment_gateway'])) {
                    unset($customerData['payment_gateway']);
                }

                $original_price = $customerData['itemprice'];
         
                $currency = (!empty($customerData['currency']) ? $customerData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                
                // 1st transaction
                $amount = $converted_amount - 1;
                     
                // 2nd transaction                     
                // $rand = floatVal('0.' . rand(60, 90));
                $rand1 = 0.5;
                $rand = $amount - $rand1;
                // 3rd transaction
                // $rand2 = $converted_amount - ($amount + $rand);
                $rand3 = 0.5;
                $rand2 = $rand - $rand3;
               
                $stripe = Stripe\Stripe::setApiKey($this->secret_key);

                \Stripe\PaymentMethod::all([
                    'customer' => $json_obj['customer_id'],
                    'type' => 'card',
                  ]);

                
                  $customer = Stripe\Customer::update(
                    $json_obj['customer_id'],
                    [
                        'description'=> $customerData['clientemail'],
                        'email' => $customerData['clientemail'],
                        'phone'=>$customerData['phonenum'],
                        'address'=> [
                            "line1"=>$customerData['address'],
                            "city"=>$customerData['city'],
                            "country"=>$customerData['country'],
                            "state"=>$customerData['statename'],
                            
                            ],
                        'metadata'=> $customerData
                        ]
                  );
                
                $intent = \Stripe\PaymentIntent::update(
                    $json_obj['payment_intent_id'], [
                        "customer" => $json_obj['customer_id'],
                        'description' => $customerData['itemname'],
                        'metadata' => $customerData,
                    ]
                );

                if(isset($json_obj['remainingPay']) && $json_obj['remainingPay'] == 'yes') {
                    $charge1 = $this->stripe_charge_paymentIntent($json_obj['customer_id'], $customerData['itemname'], number_format($rand1, 2), "USD");
                    
                    if(isset($charge1->getData()->error)) {
                        return response()->json($intent);
                    } else {
                        $charge2 = $this->stripe_charge_paymentIntent($json_obj['customer_id'], $customerData['itemname'], number_format($rand1, 2), "USD");
                        return response()->json($charge2->getData());
                    }
                    
                    // $transaction1_amount = $charge1->getData()->amount_received/100;
                    // $transaction2_amount = $charge2->getData()->amount_received/100;
                }
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Error code will be authentication_required if authentication is needed
            echo 'Error code is:' . $e->getError()->code;
            $payment_intent_id = $e->getError()->payment_intent->id;
            $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        }
    }

    public function createCustomer($customerData) {
        if (isset($customerData['item_desc'])) {
            unset($customerData['item_desc']);
        }

        if (isset($customerData['payment_gateway'])) {
            unset($customerData['payment_gateway']);
        }

        $this->paymentSetting();

        Stripe\Stripe::setApiKey($this->secret_key);

        $customer = Stripe\Customer::create([
            'description' => $customerData["clientemail"],
            'email' => $customerData["clientemail"],
            'phone' => $customerData["phonenum"],
            'address' => [
                        "line1" => $customerData["address"],
                        "city" => $customerData["city"],
                        "country" => $customerData["country"],
                        "state" => $customerData["statename"],
                    ],
            'metadata' => $customerData
            ]);

        return $customer;
    }

    public function paymentIntent(Request $request) {
        $this->paymentSetting();
        $customerData = Arr::pluck($request->all(), 'value', 'name');
        
        $intent = null;
        
        try {
            if (isset($customerData['payment_method_id'])) {
                $original_price = $customerData['itemprice'];
                $currency = (!empty($customerData['currency']) ? $customerData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                $customerData["brand_descriptor"] = $this->statement_descriptor;

                // Create a Customer:
                $customer = $this->createCustomer($customerData);
                
                \Stripe\Stripe::setApiKey($this->secret_key);

                # Create the PaymentIntent
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $customerData['payment_method_id'],
                    'amount' => $converted_amount * 100,
                    'currency' => $currency,
                    'confirmation_method' => 'manual',
                    "customer" => $customer->id,
                    'confirm' => true,
                    'statement_descriptor' => $this->statement_descriptor,
                    'description' => $customerData['itemname'],
                    'metadata' => $customerData,
                ]);
            }
            
            if (isset($customerData['payment_intent_id'])) {
                $intent = \Stripe\PaymentIntent::retrieve(
                    $customerData['payment_intent_id']
                );

                $intent->confirm();
            }

            return $this->generatePaymentResponse($intent);
            
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (Exception $e) {
            return response()->json([ 'error' => $e->getMessage()]);
        }
    }
    
    function paymentIntent_3d(Request $request) {
        $this->paymentSetting();
        $customerData = Arr::pluck($request->all(), 'value', 'name');
        $intent = null;

        \Stripe\Stripe::setApiKey($this->secret_key);

        try {
            if (isset($customerData['payment_method_id'])) {
                if (isset($customerData['item_desc'])) {
                    unset($customerData['item_desc']);
                }

                if (isset($customerData['payment_gateway'])) {
                    unset($customerData['payment_gateway']);
                }
                $original_price = $customerData['itemprice'];
                $currency = (!empty($customerData['currency']) ? $customerData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                $cus_data["brand_descriptor"] = "LOGOWEB SERVICES LO12 - DMN";

                # Create the PaymentIntent
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $customerData['payment_method_id'],
                    'amount' => $converted_amount * 100,
                    'currency' => $currency,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'statement_descriptor' => $this->statement_descriptor,
                    'metadata' => $customerData,
                ]);
            }

            if (isset($customerData['payment_intent_id'])) {
                $intent = \Stripe\PaymentIntent::retrieve(
                    $customerData['payment_intent_id']
                );
                $intent->confirm();
            }
            return $this->generatePaymentResponse($intent);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    
    function paymentIntentThreeStep_3d(Request $request) {
        $this->paymentSetting();
        $json_obj = $request->all();
        $customerData = Arr::pluck($request->paymentData, 'value', 'name');
        $intent = null;     
        $stripe = Stripe\Stripe::setApiKey($this->secret_key);
        try {
            if (isset($json_obj['payment_method_id'])) {
                if (isset($customerData['item_desc'])) {
                    unset($customerData['item_desc']);
                }

                if (isset($customerData['payment_gateway'])) {
                    unset($customerData['payment_gateway']);
                }

                $original_price = $customerData['itemprice'];
         
                $currency = (!empty($customerData['currency']) ? $customerData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                
                //1st transaction
                $amount = $converted_amount - 1;
                // 2nd transaction
                //$rand = floatVal('0.' . rand(60, 90));
                $rand = 0.5;
                // 3rd transaction
                //$rand2 = $converted_amount - ($amount + $rand);
                $rand2 = 0.5;
                $stripe = new \Stripe\StripeClient(
                    $this->secret_key
                );
                $paymentMethods = $stripe->paymentMethods->all([
                    'customer' => $json_obj['customer_id'],
                    'type' => 'card',
                ]);
               
                $customer = $stripe->customers->update(
                    $json_obj['customer_id'],
                    [
                        'description'=> $customerData['clientemail'],
                        'email' => $customerData['clientemail'],
                        'phone'=>$customerData['phonenum'],
                        'address'=> [
                            "line1"=>$customerData['address'],
                            "city"=>$customerData['city'],
                            "country"=>$customerData['country'],
                            "state"=>$customerData['statename'],
                            
                            ],
                        'metadata'=> $customerData
                        ]
                );
                $intent = $stripe->paymentIntents->update(
                    $json_obj['payment_intent_id'], [
                        "customer" => $json_obj['customer_id'],
                        'description' => $customerData['itemname'],
                        'metadata' => $customerData,
                    ]
                );

                $stripe->paymentMethods->attach(
                    $json_obj['payment_method_id'],
                    ['customer' => $json_obj['customer_id']]
                );   

                $stripe->paymentIntents->confirm(
                        $json_obj['payment_intent_id']
                    );


                    if (isset($json_obj['remainingPay']) && $json_obj['remainingPay'] == 'yes') {
                    $charge1 = $this->stripe_charge_paymentIntentThreeStep($json_obj['customer_id'], $customerData['itemname'], number_format($rand, 2), "USD");
                    $charge2 = $this->stripe_charge_paymentIntentThreeStep($json_obj['customer_id'], $customerData['itemname'], number_format($rand2, 2), "USD");
                   
                    
                    return response()->json($charge2->getData());
                    
                    
                    $transaction1_amount = $charge1->getData()->amount_received/100;
                    $transaction2_amount = $charge2->getData()->amount_received/100;
                }
              
            }
        }  catch (\Stripe\Exception\AuthenticationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    
    function paymentIntent_3d3step(Request $request) {
        $this->paymentSetting();
        $json_obj = $request->all();
        $customerData = Arr::pluck($request->paymentData, 'value', 'name');
        $intent = null;     
        $stripe = Stripe\Stripe::setApiKey($this->secret_key);
        try {
            if (isset($json_obj['payment_method_id'])) {
                if (isset($customerData['item_desc'])) {
                    unset($customerData['item_desc']);
                }

                if (isset($customerData['payment_gateway'])) {
                    unset($customerData['payment_gateway']);
                }

                $original_price = $customerData['itemprice'];
         
                $currency = (!empty($customerData['currency']) ? $customerData['currency'] : "USD");
                $converted_amount = $original_price;
                $converted_amount = (!empty($converted_amount) ? $converted_amount : $original_price);
                
                //1st transaction
                $amount = $converted_amount - 1;
                // 2nd transaction
                //$rand = floatVal('0.' . rand(60, 90));
                $rand = 0.5;
                // 3rd transaction
                //$rand2 = $converted_amount - ($amount + $rand);
                $rand2 = 0.5;
                $stripe = new \Stripe\StripeClient(
                    $this->secret_key
                );
                $paymentMethods = $stripe->paymentMethods->all([
                    'customer' => $json_obj['customer_id'],
                    'type' => 'card',
                ]);
               
                $customer = $stripe->customers->update(
                    $json_obj['customer_id'],
                    [
                        'description'=> $customerData['clientemail'],
                        'email' => $customerData['clientemail'],
                        'phone'=>$customerData['phonenum'],
                        'address'=> [
                            "line1"=>$customerData['address'],
                            "city"=>$customerData['city'],
                            "country"=>$customerData['country'],
                            "state"=>$customerData['statename'],
                            
                            ],
                        'metadata'=> $customerData
                        ]
                );
                $intent = $stripe->paymentIntents->update(
                    $json_obj['payment_intent_id'], [
                        "customer" => $json_obj['customer_id'],
                        'description' => $customerData['itemname'],
                        'metadata' => $customerData,
                    ]
                );

                $stripe->paymentMethods->attach(
                    $json_obj['payment_method_id'],
                    ['customer' => $json_obj['customer_id']]
                );   

                $stripe->paymentIntents->confirm(
                        $json_obj['payment_intent_id']
                    );

                   
                    return response()->json($intent);
                // if (isset($json_obj['remainingPay']) && $json_obj['remainingPay'] == 'yes') {
                //     $charge1 = $this->stripe_charge_paymentIntentThreeStep($json_obj['customer_id'], $customerData['itemname'], number_format($rand, 2), "USD");
                //     $charge2 = $this->stripe_charge_paymentIntentThreeStep($json_obj['customer_id'], $customerData['itemname'], number_format($rand2, 2), "USD");
                   
                    
                //     return response()->json($charge2->getData());
                    
                    
                //     $transaction1_amount = $charge1->getData()->amount_received/100;
                //     $transaction2_amount = $charge2->getData()->amount_received/100;
                // }
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Error code will be authentication_required if authentication is needed
            echo 'Error code is:' . $e->getError()->code;
            $payment_intent_id = $e->getError()->payment_intent->id;
            $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        }
    }
    
    function generatePaymentResponse($intent) {
        # Note that if your API version is before 2019-02-11, 'requires_action'
        # appears as 'requires_source_action'.
        if ($intent->status == 'requires_action' && $intent->next_action->type == 'use_stripe_sdk') {
            # Tell the client to handle the action
            return response()->json([
                'requires_action' => true,
                'payment_intent_client_secret' => $intent->client_secret
            ]);
        } else if ($intent->status == 'succeeded') {
            # The payment didn’t need any additional actions and completed!
            # Handle post-payment fulfillment
            return response()->json([
                "success" => true
            ]);
        } else {
            # Invalid status
            http_response_code(500);
            return response()->json(['error' => 'Invalid PaymentIntent status']);
        }
    }

    public function paymentSetting() {
        $payment_gateway = Session()->get('payment_gateway');

        $this->public_key = $payment_gateway->public_key;
        $this->secret_key = $payment_gateway->secret_key;
        $this->statement_descriptor = $payment_gateway->statement_descriptor;
        $this->environment = $payment_gateway->environment;
    }

    public function stripe_charge_paymentIntent($customer_id, $item_name, $amount, $currency) {
       
        $this->paymentSetting();
        \Stripe\Stripe::setApiKey($this->secret_key);
        $intent = null;
      
        try {
            $payment_method = \Stripe\PaymentMethod::all([
                'customer' => $customer_id,
                'type' => 'card',
            ]);

            $payment_method_id = $payment_method["data"][0]->id;
            $data = array("pm_id" => $payment_method_id, "customer_id" => $customer_id, $payment_method);
            
            # Create the PaymentIntent
            $intent = \Stripe\PaymentIntent::create([
                'payment_method' => $payment_method_id,
                'amount' => $amount * 100,
                'currency' => $currency,
                "customer" => $customer_id,
                'off_session' => true,
                'confirm' => true,
                'statement_descriptor' => $this->statement_descriptor,
                'description' => $item_name,
            ]);

            return response()->json($intent);

        } catch (\Stripe\Exception\AuthenticationException $e) {
       
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError(),
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function stripe_charge_paymentIntentThreeStep($customer_id, $item_name, $amount, $currency) {
        $this->paymentSetting();
        \Stripe\Stripe::setApiKey($this->secret_key);
        $intent = null;
      
        try {
            $stripe = new \Stripe\StripeClient(
                $this->secret_key
            );
            $payment_method = \Stripe\PaymentMethod::all([
                'customer' => $customer_id,
                'type' => 'card',
            ]);
            
            $payment_method_id = $payment_method["data"][0]->id;
            $data = array("pm_id" => $payment_method_id, "customer_id" => $customer_id, $payment_method);

            // $stripe->paymentMethods->attach(
            //     $payment_method_id,
            //     ['customer' => $customer_id]
            // ); 

           
           # Create the PaymentIntent
            $intent = \Stripe\PaymentIntent::create([
                'payment_method' => $payment_method_id,
                'amount' => $amount * 100,
                'currency' => $currency,
                'off_session' => true,
                'confirm' => true,
                "customer" => $customer_id,
                'statement_descriptor' => $this->statement_descriptor,
                'description' => $item_name,
            ]);

            return response()->json($intent);
          

        } catch (\Stripe\Exception\AuthenticationException $e) {
       
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError(),
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getError()->code,
            ]);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
    
    public function process(Request $request) {
        $formData = $request->all();

        return response()->json($formData);
        
        $customer = User::where("email", "=", $formData["clientemail"]);
        $paymentLink = PaymentLink::where("token", "=", $formData["ptoken"])->first();
        $paymentLink = $paymentLink->toArray();

        $payment = new Payments();

        if($customer->exists()) {
            $customerData = $customer->first();
            $customer_id = $customerData->id;
            
        } else {
            $customer = new User();
            $customer->first_name = $formData["firstname"];
            $customer->last_name = $formData["lastname"];
            $customer->email = $formData["clientemail"];
            $customer->phone_number = $formData["phonenum"];
            $customer->company_name = $formData["companyname"];
            $customer->address = $formData["address"];
            $customer->city = $formData["city"];
            $customer->state = $formData["statename"];
            $customer->zipcode = $formData["zipcode"];
            $customer->country = $formData["country"];
            $customer->created_by = $paymentLink["created_by"];
            $customer->save();
            $customer_id = $customer->id;
            $roles = "Customer";
            $customer->assignRole($roles);
        }
            
        $payment->customer_id = $customer_id;
        $payment->Item_name = $formData['itemname'];
        $payment->price = $formData['itemprice'];
        $payment->discount = $paymentLink['discount'];
        $payment->original_price = $paymentLink['original_price'];
        //$payment->item_description = $paymentLink['item_description'];
        //$payment->converted_amount = $paymentLink['converted_amount'];
        $payment->currency = $paymentLink['currency'];
        $payment->category_id = $paymentLink['category_id'];
        $payment->sale_type_id = $paymentLink['sale_type_id'];
        $payment->payment_gateway = $paymentLink['payment_gateway'];
        $payment->payment_type = $paymentLink['payment_type'];
        $payment->token = $formData['ptoken'];

        if(!empty($formData["payment_error"]) || !empty($formData["payment_message"])) {
            $error_message = array(
                "error" => $formData["payment_error"],
                "message" => $formData["payment_message"],
            );
            $payment->comment = "";
            $payment->message = json_encode($error_message);
            $payment->status = 2;
        } else {
            $payment->comment = "";
            $payment->message = "";
            $payment->status = 1;
        }

        $payment->payment_on = Carbon::now()->format('Y-m-d');
        $payment->created_by = (!empty($paymentLink['created_by']) ? $paymentLink['created_by'] : NULL);
        $payment->save();

        if(!empty($formData["payment_error"]) || !empty($formData["payment_message"])) { 
            $sessional_time = Carbon::now()->addMinutes(10)->timestamp;
            
            $failed_data = array(
                'current_time' => Carbon::now()->timestamp,
                'session' => $sessional_time,
                'currency' => $paymentLink['currency'],
                'itemprice' => $formData['itemname'],
                'title' => 'Payment Failed | '.$paymentLink['currency'].$formData['itemname'].' | Message:'.$formData["payment_message"],
                'heading' => 'Payment Failed' ,
                'message' => $formData["payment_message"]
            );
            
            return redirect()->route('payment.failed')->with($failed_data);
        } else {
            $now = Carbon::now();
            $invoice_date = $now->year.$now->month.$now->day;
            $last_id = DB::table('invoices')->latest('id')->first();

            if(!empty($this->brand_settings['company_alias'])) {
                $invoice_no = $this->brand_settings['company_alias']."-".$invoice_date."-".($now->month+(intval($last_id)+1+1000));
            } else {
                $invoice_no = "INV-".$invoice_date."-".($now->month+(intval($last_id)+1+1000));
            }

            $invoice = new Invoice();
            $invoice->invoice_no = $invoice_no;
            $invoice->customer_id = $customer_id;
            $invoice->payment_id = $payment->id;
            $invoice->created_by = (!empty($paymentLink['created_by']) ? $paymentLink['created_by'] : NULL);
            $invoice->status = 1;
            $invoice->save();
            
            if($this->paymentLinkStatus($paymentLink['id'], 0 )) {
                $success_data = array(
                    "total" => $paymentLink['original_price'],
                    "itemname" => $formData['itemname'],
                    "itemprice" => $formData['itemprice'],
                    "currency" => $paymentLink['currency'],
                    "invoice_id" => $invoice_no,
                );
    
                $this->sendInvoice($payment->id);
    
                return redirect()->route('payment.stripe.success')->with(compact('success_data'));
            }
        }
    }

    public function sendInvoice($payment_id=1) {
        $payments = DB::table('payments as p')
            ->select('p.*')
            ->join('customers as c', 'c.id', 'p.customer_id')
            ->join('invoices as i', 'i.customer_id', 'p.customer_id')
            ->get();

        return response()->json($payments);

        $customer = User::role('Customer')->get()->first();
        $payment = Payments::where("customer_id",$customer->id)->get()->first();
        
        App::make('SmtpSettingProvider');

        if(Mail::to($customer->email)->send(new InvoiceEmail($payment))) {
            return true;
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
