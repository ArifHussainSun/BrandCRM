<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Payment\StripeVController;
use App\Http\Controllers\PaymentLinkController;

Route::name('front.')->controller(BriefController::class)->group(function () {
       Route::get('/slogan', 'slogan')->name('slogan');
       Route::get('/slogan/industry', 'industry')->name('industry');
       Route::get('/slogan/logo/style', 'logo_style')->name('logostyle');
       Route::get('/slogan/color/picker', 'color_picker')->name('colorpicker');
       Route::get('/slogan/logo/type', 'logo_type')->name('logotype');
       Route::get('/slogan/personal/info', 'personal_info')->name('personalinfo');
       Route::get('/slogan/thankyou', 'thankyou')->name('thankyou');
});


Auth::routes();

//Invoice routes
Route::controller(InvoiceController::class)->group(function () {
       Route::any('/invoice/send', 'send')->name('invoice.send');
});

   //Stripe routes
Route::controller(StripeController::class)->group(function () {
       Route::get('/payment/stripe', 'index')->name('payment.stripe')->middleware(['verifyPaymentToken']);
       Route::get('/payment/stripe/three_step', 'three_step')->name('payment.stripe_three_step')->middleware(['verifyPaymentToken']);
       Route::post('/payment/stripe/paymentIntent', 'paymentIntent')->name('payment.stripe.paymentIntent');
       Route::post('/payment/stripe/paymentIntent_3d', 'paymentIntent_3d')->name('payment.stripe.paymentIntent_3d');
       Route::post('/payment/stripe/paymentIntent_3d3step', 'paymentIntent_3d3step')->name('payment.stripe.paymentIntent_3d3step');
       Route::post('/payment/stripe/paymentIntentThreeStep_3d', 'paymentIntentThreeStep_3d')->name('payment.stripe.paymentIntentThreeStep_3d');
       Route::post('/payment/stripe/PaymentIntent_succeeded', 'PaymentIntent_succeeded')->name('payment.stripe.PaymentIntent_succeeded');
       Route::get('/payment/stripe/success', 'success')->name('payment.stripe.success');
       Route::any('/payment/stripe/createPaymentMethod', 'createPaymentMethod')->name('payment.stripe.createPaymentMethod');
       Route::any('/payment/stripe/createThreeStepPaymentMethod', 'createThreeStepPaymentMethod')->name('payment.stripe.createThreeStepPaymentMethod');
       Route::post('/payment/stripe/process', 'process')->name('payment.stripe.process');
       
       Route::any('/payment/sendInvoice', 'sendInvoice')->name('payment.sendInvoice');
});

//Stripe routes
Route::controller(StripeVController::class)->group(function () {
       Route::get('/payment2/stripe', 'index')->name('payment.stripe')->middleware(['verifyPaymentToken']);
       Route::get('/payment2/stripe/three_step', 'three_step')->name('payment.stripe_three_step')->middleware(['verifyPaymentToken']);
       Route::post('/payment2/stripe/paymentIntent', 'paymentIntent')->name('payment.stripe.paymentIntent');
       Route::post('/payment2/stripe/paymentIntent_3d', 'paymentIntent_3d')->name('payment.stripe.paymentIntent_3d');
       Route::post('/payment2/stripe/paymentIntent_3d3step', 'paymentIntent_3d3step')->name('payment.stripe.paymentIntent_3d3step');
       Route::post('/payment2/stripe/paymentIntentThreeStep_3d', 'paymentIntentThreeStep_3d')->name('payment.stripe.paymentIntentThreeStep_3d');
       Route::post('/payment2/stripe/PaymentIntent_succeeded', 'PaymentIntent_succeeded')->name('payment.stripe.PaymentIntent_succeeded');
       Route::get('/payment2/stripe/success', 'success')->name('payment.stripe.success');
       Route::any('/payment2/stripe/createPaymentMethod', 'createPaymentMethod')->name('payment.stripe.createPaymentMethod');
       Route::any('/payment2/stripe/createThreeStepPaymentMethod', 'createThreeStepPaymentMethod')->name('payment.stripe.createThreeStepPaymentMethod');
       Route::post('/payment2/stripe/process', 'process')->name('payment.stripe.process');
       
       Route::any('/payment/sendInvoice', 'sendInvoice')->name('payment.sendInvoice');
});


Route::controller(PaymentController::class)->group(function() {
       Route::get('/payment/success', 'success')->name('payment.success');
       Route::get('/payment/failed', 'failed')->name('payment.failed');
       Route::get('/payment/expired', 'expired')->name('payment.expired');
       Route::get('/payment/fetch', 'tokenData')->name('payment.fetch.token')->middleware(['verifyPaymentToken']);
       Route::get('/payment/generatelink/{id}', 'generatelink')->name('payment.generatelink');
       Route::any('/payment/storePaymentApi', 'storePaymentApi')->name('payment.store.checkout');
       Route::any('/payment/redeemCoupon', 'redeemCoupon')->name('payment.redeem.coupon');
       Route::post('/payment/sendEmailToClient', 'sendEmailToClient')->name('payment.sendEmailToClient');
});

Route::controller(PaymentLinkController::class)->group(function() {
       Route::get('/payment/ptoken', 'paymentGenerator')->name('payment.ptoken');
       Route::post('/payment/link/store', 'paymentGeneratorStore')->name('payment.link.store');
});

//FRONTEND
Route::name('front.')->group(function() {

       // For Single Route
      // Route::get('/{slug?}','briefslug')->name('slug');

      // For Multiple Route
//       Route::any('{slug}', [FrontendController::class, 'slug'])->where('slug', '(.*)')->name('slug');
      
      Route::get('/', [FrontendController::class, 'index'])->name('home');
      Route::get('/about-us', [FrontendController::class, 'about_us'])->name('about.us');
      Route::get('/logo-and-branding', [FrontendController::class, 'logo_branding'])->name('logo.and.branding');
      Route::get('/website-design', [FrontendController::class, 'website_design'])->name('website.design');
      Route::get('/pricing', [FrontendController::class, 'pricing'])->name('pricing');
      Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
      Route::get('/contact-us', [FrontendController::class, 'contact_us'])->name('contact.us');
      Route::post('/contact-us', [FrontendController::class, 'contact_us_process'])->name('contact.us.process');
});