@extends('frontend.layouts.brief.master')
@section('container')
@push('customStyles')

<style>
    .single-final {
        background: #fff;
        border-radius: 4px;
        overflow: hidden;
        margin: 0 -7px;
    }

    .single-final-text {
        width: 100%;
        padding: 20px;
    }

    .single-final-link {
        text-align: center;
    }

    .btn-area {
        padding: 30px 0px;
    }


    .step-container {
        height: auto;
    }

    .step-center {
        position: relative;
        top: 0px;
        width: 100%;
        transform: initial;
    }

    .single-final-text {
        padding: 20px 20px 10px 20px;
    }

    .step-label img {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    .step-form {
        height: auto !important;
        padding-top: 25px;
        padding-bottom: 15px;
    }
</style>

@endpush



<div class="step-form">
    <section class="step-container">
        <div class="step-center top-mob">
            <div class="container">
                <div class="step-heading">
                    <h1>Thank You John,<br>How Would You Like To Proceed?</h1>
                </div>

                <div class="step-input-area">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="step-label">
                                <img src="{{ asset('frontend/assets/brief/images/steps/final-step/livechat.jpg')}}" alt="Live Chat">
                                <div class="single-final-text">
                                    <h4>Live Chat Support</h4>
                                    <p>Let's Talk! Share your design requirements with one of our designers to get a perfect logo that you envisioned</p>
                                    <div class="d-flex justify-content-center btn-area">
                                        <a href="javascript:void(0)" onclick="$zopim.livechat.window.toggle()" class="btn primary-button">Lets Chat</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="step-label">
                                <img src="{{ asset('frontend/assets/brief/images/steps/final-step/pricing.jpg')}}" alt="Live Chat">
                                <div class="single-final-text">
                                    <h4>Pricing Packages</h4>
                                    <p>Checkout our budget friendly packages & pricing plans tailor made for startups & growing businesses of all sizes</p>
                                    <div class="d-flex justify-content-center btn-area">
                                        <a href="{{route('front.pricing')}}#logo-design-pricing" class="btn primary-button">View Pricing</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="step-label">
                                <img src="{{ asset('frontend/assets/brief/images/steps/final-step/portfolio.jpg')}}" alt="Live Chat">
                                <div class="single-final-text">
                                    <h4>Creative Portfolio</h4>
                                    <p>Checkout our amazing logo projects that we have designed for our recent customers to give their brand an identity</p>
                                    <div class="d-flex justify-content-center btn-area">
                                        <a href="{{route('front.portfolio')}}" class="btn primary-button">Visit Portfolio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection