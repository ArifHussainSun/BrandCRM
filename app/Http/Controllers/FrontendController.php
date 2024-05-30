<?php

namespace App\Http\Controllers;

use App\Models\Contactinfo;
use App\Models\Contactqueries;
use App\Models\Pages;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   /* public function slug(Request $request, $slug = null)
    {
        $data=array();

        if ($slug == null) {
            $page = Pages::where('name', 'home')->firstOrFail();
        }
         else {
            $page = Pages::where('url', $slug)->firstOrFail();
        }

        $contentWithBlade = Blade::render($page->pages_content,$data);
        $session = $request->session()->put('key', $page);
            return view('frontend.pages.template', compact('contentWithBlade', 'page'));
      

    }*/
    public function index()
    {

        $services = Service::whereNull('deleted_at')->get();
        $page = Pages::where('url', 'home')->first();
        return view('frontend.pages.home', compact('page','services'));
    }

    public function about_us()
    {
        $page = Pages::where('url', 'about_us')->first();
        return view('frontend.pages.about_us', compact('page'));
    }

    public function logo_branding()
    {
        $page = Pages::where('url', 'logo_branding')->first();
        return view('frontend.pages.logo_branding', compact('page'));
    }

    public function website_design()
    {
        $page = Pages::where('url', 'website_design')->first();
        return view('frontend.pages.website_design', compact('page'));
    }

    public function pricing()
    {
        $page = Pages::where('url', 'pricing')->first();
        return view('frontend.pages.pricing', compact('page'));
    }

    public function portfolio()
    {
        $page = Pages::where('url', 'portfolio')->first();
        return view('frontend.pages.portfolio', compact('page'));
    }

    public function contact_us()
    {
        $page = Pages::where('url', 'contact_us')->first();
        return view('frontend.pages.contact_us', compact('page'));
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

    public function contact_us_process(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'subject' => 'nullable|string',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $contact = new Contactqueries();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->pages_id = '5';
        
        if($contact->save()) {
            $content['name'] = $request->name;
            $content['subject'] = $request->subject;
            $content['email'] = $request->email;
            $content['message'] = $request->message;

            //Mail::to('jostalin376@gmail.com')->send(new ContactMail($content));

            $notification['type'] = "success";
            $notification['message'] = "Your Message Sent Successfully.";

            return redirect(route('front.contact.us'))->with('notify_response', $notification);
        } else {
            $notification['type'] = "danger";
            $notification['message'] = "Some error occured, please try again.";

            return redirect()->back()->with('notify_response', $notification);
        }
    } 
}
