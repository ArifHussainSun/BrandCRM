<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandSettings;
use App\Models\CountryCurrencies;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuickNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class BrandSettingsController extends Controller
{
    function __construct()
    {
        $this->brandsettingsimagepath = 'backend/assets/images/weblogos/';

        $this->faqsimagepath = 'backend/assets/images/faqs/';
        //$this->middleware('permission:Faq-Create|Faq-Edit|Faq-View|Faq-Delete', ['only' => ['index','store']]);

    }

    // start logo & favicon
    public function form()
    {
        $data["logo"] = BrandSettings::where("key_name", '=', "logo")->first();
        $data["logo_white"] = BrandSettings::where("key_name", '=', "logo_white")->first();
        $data["favicon"] = BrandSettings::where("key_name", '=', "favicon")->first();

        return view('admin.brandsettings.brandsettinglogos', $data);
    }

    public function general_setting()
    {
        $data["logo"] = BrandSettings::where("key_name", '=', "logo")->first();
        $data["logo_white"] = BrandSettings::where("key_name", '=', "logo_white")->first();
        $data["favicon"] = BrandSettings::where("key_name", '=', "favicon")->first();

        $brandSettings = Arr::pluck(BrandSettings::select('key_name', 'key_value')->where('status', 1)->get(), 'key_value', 'key_name');
        $data['brand_setting'] = $brandSettings;
        return view('admin.brandsettings.general-setting', $data);
    }

    public function store(Request $request)
    {
        $valid =  $request->validate([
            'logo' => 'image|mimes:png,webp,svg|max:2048',
            'logo_white' => 'image|mimes:png,webp,svg|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,webp,svg,ico|max:2048',
        ]);

        if (!$valid) {
            return;
        }

        $management = User::role(['Admin', 'Brand Manager'])->get();
        $notify = [
            'performed_by' => Auth::user()->id,
            'desc' => ['added_title' => $request->input('key_value')],
        ];

        if ($request->hasFile('logo')) {
            $logo = BrandSettings::where('key_name', 'logo')->first() ?? new BrandSettings();
            $logo->key_name = 'logo';
            $imagename = 'logo.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path($this->brandsettingsimagepath), $imagename);
            $logo->key_value = $this->brandsettingsimagepath . $imagename;
            $logo->save();

            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => "Added new Company Logo",
                "desc" => array(
                    "added_title" => $request->input('key_value'),
                )
            );
            Notification::send($management, new QuickNotify($notify));
        }

        if ($request->hasFile('logo_white')) {
            $logo_white = BrandSettings::where('key_name', 'logo_white')->first() ?? new BrandSettings();
            $logo_white->key_name = 'logo_white';
            $imagename = 'logo_white.' . $request->file('logo_white')->getClientOriginalExtension();
            $request->file('logo_white')->move(public_path($this->brandsettingsimagepath), $imagename);
            $logo_white->key_value = $this->brandsettingsimagepath . $imagename;
            $logo_white->save();

            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => "Added new Company Logo White",
                "desc" => array(
                    "added_title" => $request->input('key_value'),
                )
            );
            Notification::send($management, new QuickNotify($notify));
        }

        if ($request->hasFile('favicon')) {
            $favicon = BrandSettings::where('key_name', 'favicon')->first() ?? new BrandSettings();
            $favicon->key_name = 'favicon';
            $imagename = 'favicon.' . $request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move(public_path($this->brandsettingsimagepath), $imagename);
            $favicon->key_value = $this->brandsettingsimagepath . $imagename;
            $favicon->save();

            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => "Added new Company favicon",
                "desc" => array(
                    "added_title" => $request->input('key_value'),
                )
            );
            Notification::send($management, new QuickNotify($notify));
        }

        return redirect()->back()->with('success', 'logo has been successfully saved.');
    }



    public function themestore(Request $request)
    {
        $valid = $request->validate([
            'primary_color' => 'nullable',
            'secondary_color' => 'nullable',
            'default_customer_password' => 'nullable',
        ]);

        if ($valid) {
            $management = User::role(['Admin', 'Brand Manager'])->get();

            if ($request->primary_color) {
                $primary_color = BrandSettings::updateOrCreate(['key_name' => 'primary_color'], ['key_value' => $request->primary_color]);
                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $primary_color->wasRecentlyCreated ? "Added New Theme Primary Color" : "Updated Theme Primary Color",
                    "desc" => array(
                        "added_title" => $request->input('key_value'),
                    )
                );
                Notification::send($management, new QuickNotify($notify));
            }

            if ($request->secondary_color) {
                $secondary_color = BrandSettings::updateOrCreate(['key_name' => 'secondary_color'], ['key_value' => $request->secondary_color]);
                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $secondary_color->wasRecentlyCreated ? "Added New Theme Secondary color" : "Updated Theme Secondary color",
                    "desc" => array(
                        "added_title" => $request->input('key_value'),
                    )
                );
                Notification::send($management, new QuickNotify($notify));
            }

            if ($request->default_customer_password) {
                $default_customer_password = BrandSettings::updateOrCreate(['key_name' => 'default_customer_password'], ['key_value' => $request->default_customer_password]);
                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $default_customer_password->wasRecentlyCreated ? "Added Customer Default Password" : "Updated Customer Default Password",
                    "desc" => array(
                        "added_title" => $request->input('key_value'),
                    )
                );
                Notification::send($management, new QuickNotify($notify));
            }
            return redirect()->back()->with('success', 'Theme has been successfully saved.');
        } else {
            return redirect()->back();
        }
    }



    // end logo & favicon

    // start contactin formation

    public function contactinformationstore(Request $request)
    {
        $fields = [
            'company_alias' => 'Company Alias',
            'company_name' => 'Company Name',
            'company_phone' => 'Company Phone',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
        ];

        foreach ($fields as $key => $label) {
            if ($request->filled($key)) {
                $setting = BrandSettings::where('key_name', $key)->first();
                $isNewSetting = !$setting;

                if ($isNewSetting) {
                    $setting = new BrandSettings();
                }

                $setting->key_name = $key;
                $setting->key_value = $request->$key;
                $setting->save();

                $management = User::role(['Admin', 'Brand Manager'])->get();
                $management->pluck('id');

                $action = $isNewSetting ? 'Added New' : 'Updated';
                $title = "$action Contact Information $label";
                $desc = ['added_title' => $request->$key];

                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $title,
                    "desc" => array(
                        "added_title" => $request->input('key_value'),
                    )
                );
            }
        }
        Notification::send($management, new QuickNotify($notify));

        return redirect()->back()->with('success', "Contact information has been saved");
    }

    // end contactin formation

    // start social link

    public function sociallinkstore(Request $request)
    {
        $socialLinks = [
            'social_facebook' => 'Company Facebook',
            'social_instagram' => 'Company Instagram',
            'social_twitter' => 'Company Twitter',
            'social_youtube' => 'Company YouTube',
            'social_linkedin' => 'Company LinkedIn'
        ];

        foreach ($socialLinks as $key => $value) {
            if ($request->$key) {
                $brandSetting = BrandSettings::where('key_name', $key)->first();

                if ($brandSetting) {
                    $notificationTitle = 'Updated Social Links ' . $value;
                } else {
                    $brandSetting = new BrandSettings();
                    $brandSetting->key_name = $key;
                    $notificationTitle = 'Added New Social Links ' . $value;
                }

                $brandSetting->key_value = $request->$key;
                $brandSetting->save();

                $management = User::role(['Admin', 'Brand Manager'])->get();
                $management->pluck('id');

                $notify = array(
                    "performed_by" => Auth::user()->id,
                    "title" => $notificationTitle,
                    "desc" => array(
                        "added_title" => $request->input('key_value'),
                    )
                );
            }
        }
        Notification::send($management, new QuickNotify($notify));
        return redirect()->back()->with('success', 'Social Links has been saved.');
    }

    // end social link

    // start custom header & footer
    public function customheaderfooterform()
    {
        $data = [];

        $keys = ["customheader", "customfooter"];
        $settings = BrandSettings::whereIn("key_name", $keys)->get()->keyBy("key_name");

        foreach ($keys as $key) {
            $data[$key] = $settings->get($key);
        }

        return view('admin.brandsettings.customheaderfooter', $data);
    }


    public function customheaderfooterstore(Request $request)
    {
        $valid =  $request->validate([
            'customheader' => 'nullable',
            'customfooter' => 'nullable',
        ]);

        $management = User::role(['Admin', 'Brand Manager'])->get();
        $management->pluck('id');

        if ($request->customheader) {
            $customheader = BrandSettings::updateOrCreate(
                ['key_name' => 'customheader'],
                ['key_value' => ($request->customheader == "<p><br></p>") ? "" : $request->customheader]
            );

            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => $customheader->wasRecentlyCreated ? "Added Custom Header" : "Updated Custom Header",
                "desc" => array(
                    "added_title" => $request->input('key_value'),
                )
            );
            Notification::send($management, new QuickNotify($notify));
        }

        if ($request->customfooter) {
            $customfooter = BrandSettings::updateOrCreate(
                ['key_name' => 'customfooter'],
                ['key_value' => ($request->customfooter == "<p><br></p>") ? "" : $request->customfooter]
            );

            $notify = array(
                "performed_by" => Auth::user()->id,
                "title" => $customfooter->wasRecentlyCreated ? "Added Custom Footer" : "Updated Custom Footer",
                "desc" => array(
                    "added_title" => $request->input('key_value'),
                )
            );
            Notification::send($management, new QuickNotify($notify));
        }

        Session::flash('success', 'Custom Footer & Header has been successfully Saved.');
        return response()->json(['success' => true, 'route' => route('admin-brand-settings-custom-header-footer-form')], 200);
    }


    // end custom header & footer

    // start mail setting
    public function mailsettingform()
    {
        $data['mailSettings'] = BrandSettings::where('key_name', 'like', '%mail_setting_%')->get();
        return view('admin.brandsettings.mailsetting', $data);
    }


    public function mailsettingstore(Request $request)
    {
        $mail_setting = Str::lower($request->name);
        $mail_setting_email = Str::lower($request->email);

        $mail_settings = "mail_setting_" . str_replace(' ', '_', $mail_setting);

        $valid = $request->validate([
            'name' => 'required|unique:brand_settings,key_name',
            'email' => 'required|email',
        ]);

        $mail_setting_value = [
            "mail_protocol" => "",
            "mail_smtp_host" => "",
            "mail_smtp_port" => "",
            "mail_smtp_user" => "",
            "mail_smtp_email" => $mail_setting_email,
            "mail_smtp_pass" => "",
            "mail_charset" => "",
            "mail_wordwrap" => "",
            "mail_mailtype" => "",
            'mail_smtpcrypto' => "",
        ];

        $mail_setting = new BrandSettings();
        $mail_setting->key_name = $mail_settings;
        $mail_setting->key_value = json_encode($mail_setting_value);

        $management = User::role(['Admin', 'Brand Manager'])->get();

        if ($mail_setting->save()) {
            $notify = [
                "performed_by" => Auth::user()->id,
                "title" => "Added New Email Setting",
                "desc" => [
                    "added_title" => $request->input('key_value'),
                ]
            ];
            Notification::send($management, new QuickNotify($notify));
            Session::flash('success', 'Mail Settings has been successfully Save.');
            return redirect()->back()->with('success', 'Mail Settings has been successfully saved.');
        } else {
            Session::flash('error', 'Mail Settings has been Saving failed.');
            return redirect()->back()->with('error', 'Mail Settings has been Saving failed');
        }
    }

    public function mailSettingUpdate(Request $request)
    {
        $valid = $request->validate([
            'mail_setting_key' => 'required',
            'mail_protocol' => 'required',
            'mail_mailtype' => 'nullable',
            'mail_charset' => 'required',
            'mail_wordwrap' => 'required',
            'mail_smtp_host' => 'required',
            'mail_smtp_port' => 'required',
            'mail_smtpcrypto' => 'required',
            'mail_smtp_user' => 'nullable',
            'mail_smtp_email' => 'nullable|email',
            'mail_smtp_pass' => 'nullable',
        ]);

        if ($valid) {
            $mail_settings = BrandSettings::where("key_name", '=', $request->mail_setting_key)->first();

            if ($mail_settings) {
                $mail_settings->key_value = json_encode([
                    "mail_protocol" => $request->mail_protocol,
                    "mail_mailtype" => $request->mail_mailtype,
                    "mail_charset" => $request->mail_charset,
                    "mail_wordwrap" => $request->mail_wordwrap,
                    "mail_smtp_host" => $request->mail_smtp_host,
                    "mail_smtp_port" => $request->mail_smtp_port,
                    "mail_smtpcrypto" => $request->mail_smtpcrypto,
                    "mail_smtp_user" => $request->mail_smtp_user,
                    "mail_smtp_email" => $request->mail_smtp_email,
                    "mail_smtp_pass" => $request->mail_smtp_pass,
                ]);

                $management = User::role(['Admin', 'Brand Manager'])->get();
                $management->pluck('id');

                if ($mail_settings->save()) {
                    $notify = [
                        "performed_by" => Auth::user()->id,
                        "title" => "Updated Email Setting",
                        "desc" => [
                            "updated_title" => $request->mail_setting_key,
                        ]
                    ];
                    Notification::send($management, new QuickNotify($notify));
                    Session::flash('success', 'Mail Settings have been successfully saved.');
                    return redirect()->back()->with('success', 'Mail Settings have been successfully saved.');
                } else {
                    Session::flash('error', 'Mail Settings were not saved.');
                    return redirect()->back()->with('error', 'Mail Settings were not saved.');
                }
            }
        }

        return redirect()->back()->with('error', 'Mail Settings were not saved.');
    }






    public function paymentsettingform()
    {
        $currency = CountryCurrencies::all();
        $default_currency = BrandSettings::where("key_name", 'default_currency')->firstOrFail();
        $default_payment_gateway = BrandSettings::where("key_name", 'default_payment_gateway')->firstOrFail();
        $paymentGateways = BrandSettings::where('key_name', 'like', '%payment_gateway_%')->get();

        return view('admin.brandsettings.paymentsetting', compact('currency', 'paymentGateways', 'default_payment_gateway', 'default_currency'));
    }


    public function paymentsetting_default(Request $request)
    {
        $request->validate([
            'default_payment_gateway' => 'required',
            'default_currency' => 'required'
        ]);

        $management = User::role(['Admin', 'Brand Manager'])->get();

        $default_payment_gateway = BrandSettings::updateOrCreate(
            ['key_name' => 'default_payment_gateway'],
            ['key_value' => $request->default_payment_gateway]
        );

        $notify = [
            'performed_by' => Auth::user()->id,
            'title' => 'Updated Payment Gateway Setting Default Payment Gateway',
            'desc' => [
                'added_title' => $request->default_payment_gateway,
            ],
        ];

        Notification::send($management, new QuickNotify($notify));

        $default_currency = BrandSettings::updateOrCreate(
            ['key_name' => 'default_currency'],
            ['key_value' => $request->default_currency]
        );

        $notify = [
            'performed_by' => Auth::user()->id,
            'title' => 'Updated Payment Gateway Setting Default Currency',
            'desc' => [
                'added_title' => $request->default_currency,
            ],
        ];

        Notification::send($management, new QuickNotify($notify));

        return redirect()->back()->with('success', 'Payment Default Settings have been successfully saved.');
    }


    public function paymentsettingstore(Request $request)
    {
        $gatewayType = strtolower($request->payment_gateway_type);
        $gatewayName = strtolower(str_replace(' ', '_', $request->name));
        $gatewayKey = "payment_gateway_{$gatewayType}_{$gatewayName}";

        $request->merge([
            'name' => $gatewayKey,
        ]);

        $validatedData = $request->validate([
            'payment_gateway_type' => 'required',
            'name' => 'required|unique:brand_settings,key_name',
        ]);

        $paymentGateway = new BrandSettings([
            'key_name' => $gatewayKey,
            'key_value' => json_encode([
                'merchant_id' => '',
                'public_key' => '',
                'secret_key' => '',
                'statement_descriptor' => '',
                'environment' => '',
            ]),
        ]);

        $management = User::role(['Admin', 'Brand Manager'])->get();
        $management->pluck('id');
        $paymentGateway->save();

        $notify = [
            'performed_by' => Auth::user()->id,
            'title' => 'Added New Payment Gateway Setting',
            'desc' => [
                'added_title' => $request->input('key_value'),
            ]
        ];

        Notification::send($management, new QuickNotify($notify));

        Session::flash('success', 'Payment Setting has been successfully saved.');
        return redirect()->back()->with('success', 'Payment Setting has been successfully saved.');
    }


    public function updateGatewaySetting(Request $request)
    {
        $request->validate([
            'gateway_key' => 'required',
            'merchant_id' => 'nullable',
            'public_key' => 'required',
            'secret_key' => 'required',
            'statement_descriptor' => 'nullable',
            'environment' => 'required',
        ]);

        $paymentgateway = BrandSettings::where("key_name", '=', $request->gateway_key)->first();

        if ($paymentgateway) {
            $paymentgateway->update([
                'key_value' => json_encode([
                    "merchant_id" => $request->merchant_id ?? "",
                    "public_key" => $request->public_key,
                    "secret_key" => $request->secret_key,
                    "statement_descriptor" => $request->statement_descriptor ?? "",
                    "environment" => $request->environment,
                ]),
            ]);

            $management = User::role(['Admin', 'Brand Manager'])->get();
            Notification::send($management, new QuickNotify([
                "performed_by" => Auth::user()->id,
                "title" => "Updated Payment Gateway Setting",
                "desc" => [
                    "added_title" => $request->input('key_value'),
                ],
            ]));

            Session::flash('success', 'Payment Gateway has been successfully saved.');
            return redirect()->back()->with('success', 'Payment Setting has been successfully saved.');
        }

        return redirect()->back();
    }
}