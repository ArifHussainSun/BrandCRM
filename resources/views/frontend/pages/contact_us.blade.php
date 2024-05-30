@extends('frontend.layouts.master')
@section('container')
<section class="page-banner d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('frontend/assets/images/Dots_2.svg') }}" class="page-banner-dot" alt="">
    <img src="{{ asset('frontend/assets/images/Dots_2.svg') }}" class="page-banner-dot2" alt="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading text-center">
                    <h2>You Can’t Resist Our Logo Designs For Sure</span>
                    </h2>
                    <h3>Our custom logo design services make your business groan loud with creativity and passionated artistic touches</h3>
                    <div class="btn-div mt-5">
                        <a href="#">Get Started</a>
                        <a href="{{ route('front.pricing') }}">Pricing</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-section mb-md-5">

    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-10">
                <h5><span class="sub-heading">Need Help ?</span></h5>
                <h2>Contact Us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                <form class="form" action="{{ route('front.contact.us.process') }}" method="post">
                    @csrf

                    @if(Session::has("notify_response"))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-{{ Session::get('notify_response')['type'] }}" role="alert">
                                    {{ Session::get("notify_response")["message"] }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control input-box1 mobile-box02" placeholder="Your Name *" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control input-box1" placeholder="Your Email *" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control input-box1 mobile-box02" placeholder="Subject">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <textarea type="message" name="message" placeholder="Your Message" class="form-control input-box2" required></textarea>
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col-md-12">
                            <input type="submit" name="submit" class="submit" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-10 p-0 mb-5">
                <div class="row">
                    @if(!empty($brand_settings["company_number"]->key_value))
                        <div class="col-md-4">
                            <div class="bottom-contact">
                                <i class="fa-solid fa-phone-volume"></i> {{$brand_settings["company_number"]->key_value}}
                            </div>
                        </div>
                    @endif

                    @if(!empty($brand_settings["company_email"]->key_value))
                        <div class="col-md-4">
                            <div class="bottom-contact">
                                <i class="fa-solid fa-envelope"></i> {{$brand_settings["company_email"]->key_value}}
                            </div>
                        </div>
                    @endif

                    @if(!empty($brand_settings["company_address"]->key_value))
                        <div class="col-md-4">
                            <div class="bottom-contact">
                                <i class="fa-solid fa-map-marker"></i> {{$brand_settings["company_address"]->key_value}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection