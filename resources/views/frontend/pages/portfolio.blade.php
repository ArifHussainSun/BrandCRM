@extends('frontend.layouts.master')
@section('container')
<section class="page-banner d-flex justify-content-center align-items-center">
    <img src="{{ asset('frontend/images/Assets/Dots_2.svg') }}" class="page-banner-dot" alt="">
    <img src="{{ asset('frontend/images/Assets/Dots_2.svg') }}" class="page-banner-dot2" alt="">
    <div class="main-heading">
        <h2>Logo Designs With Beautiful Pixels</span>
        </h2>
        <h3>Get a Custom Design Services Crafted With Professional Touches And Bespoke Creativity</h3>
    </div>
</section>
<section class="portfolio text-md-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-div text-center">
                    <h2>Our Portfolio Is Filled With Creativity</h2>
                    <p class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla tempore ullam in aut debitis non autem quidem optio temporibus nisi nostrum odit sapiente, dolores hic distinctio error natus consequatur quisquam illo. Omnis dignissimos
                        molestias quae.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-width mt-4 mb-5">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="portfolio-tabs mt-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-portfolio-tab" data-bs-toggle="tab" data-bs-target="#all-portfolio" type="button" role="tab" aria-controls="all-portfolio" aria-selected="true">all</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="logodesign-port-tab" data-bs-toggle="tab" data-bs-target="#logodesign-port" type="button" role="tab" aria-controls="logodesign-port" aria-selected="false">logo design</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="branding-port-tab" data-bs-toggle="tab" data-bs-target="#branding-port" type="button" role="tab" aria-controls="branding-port" aria-selected="false">wesbite</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="webdesign-port-tab" data-bs-toggle="tab" data-bs-target="#webdesign-port" type="button" role="tab" aria-controls="webdesign-port" aria-selected="false">car wrap </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="videoani-port-tab" data-bs-toggle="tab" data-bs-target="#videoani-port" type="button" role="tab" aria-controls="videoani-port" aria-selected="false">video animation</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shirts-port-tab" data-bs-toggle="tab" data-bs-target="#shirts-port" type="button" role="tab" aria-controls="shirts-port" aria-selected="false">shirts</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="signage-port-tab" data-bs-toggle="tab" data-bs-target="#signage-port" type="button" role="tab" aria-controls="signage-port" aria-selected="false">signage</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all-portfolio" role="tabpanel" aria-labelledby="all-portfolio-tab">
                        <div class="row">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-16.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-16.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-03.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-03.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-05.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-05.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-08.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-08.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-12.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-12.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-15.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-15.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-17.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-17.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-17.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-17.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-20.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-20.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-11.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-11.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-22.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-22.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-25.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-25.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-30.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-30.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-23.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-23.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-27.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-27.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/1.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/2.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/3.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/4.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/4.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/5.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/5.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/6.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/6.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/7.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/7.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/8.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/8.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/9.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/9.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/branding/10.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/branding/10.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-01.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-01.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-02.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-02.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-03.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-03.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-04.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-04.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-05.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-05.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-07.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-07.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-08.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-08.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-09.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-09.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-10.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-10.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-11.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-11.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-12.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-12.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-13.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-13.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-14.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-14.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-15.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-15.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-16.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/portfolio3-16.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="logodesign-port" role="tabpanel" aria-labelledby="logodesign-port-tab">
                        <div class="row">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-01.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-01.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-02.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-02.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-16.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-16.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-04.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-04.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/portfolio3-06.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-05.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-06.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-06.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-07.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-07.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-08.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-08.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-09.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-09.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-10.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-10.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-11.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-11.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-12.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-12.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-13.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-13.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-14.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-14.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-15.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-15.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-16.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-16.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-17.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-17.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-18.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-18.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-19.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-19.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-20.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-20.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-21.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>

                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-21.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-22.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-22.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-23.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-23.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-24.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-24.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-25.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-25.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-md-5">
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-26.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-26.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-27.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-27.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-28.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-28.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-29.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-29.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-30.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio-30.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-5">
                            <div class="col">
                                <div class="img-div">

                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-01.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-01.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-02.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-02.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-03.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-03.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-04.jpg') }}" data-fancybox="gallery">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-04.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-div">
                                    <div class="portfolio-overlay-img">
                                        <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-05.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-05.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class=" row mt-md-5 ">
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-06.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-06.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-07.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-07.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-08.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-08.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-09.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-09.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-10.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-10.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class=" row mt-md-5 ">
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-11.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-11.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-12.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-12.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-13.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-13.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-14.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-14.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-15.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-15.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class=" row mt-md-5 ">
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-16.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-16.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-17.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-17.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-18.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-18.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-19.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-19.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-20.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-20.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class=" row mt-md-5 ">
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-21.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-21.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-22.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-22.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-23.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-23.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-24.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-24.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-25.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-25.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class=" row mt-md-5 ">
                                <div class=" col ">
                                    <div class=" img-div ">
                                        <div class=" portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-26.jpg') }}" data-fancybox=" gallery ">
                                                <i class=" fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio-new/logo/portfolio2-26.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class=" img-div ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" tab-pane fade " id=" branding-port" role="tabpanel " aria-labelledby="branding-port-tab">
                            <div class="row ">
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/cms/17.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/cms/17.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/cms/18.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/cms/18.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/cms/4.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/cms/4.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/ecom/2.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/2.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/ecom/1.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/1.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4 ">
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/ecom/3.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/3.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/ecom/4.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/4.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/ecom/5.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/5.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/1.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/1.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/2.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/2.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4 ">
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/3.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/3.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/4.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/4.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/5.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/5.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/6.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/6.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/7.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/7.jpg') }}" alt=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4 ">
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/8.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/8.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/html/8.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/8.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                        <div class="portfolio-overlay-img ">
                                            <a href="{{ asset('frontend/assets/images/portfolio/website/portal/2.jpg') }}" data-fancybox="gallery ">
                                                <i class="fa-solid fa-magnifying-glass "></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/portal/2.jpg') }}" alt=" ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="img-div ">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade " id="webdesign-port" role="tabpanel " aria-labelledby="webdesign-port-tab">
                        <div class="row ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/carwrap/1.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/carwrap/1.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/carwrap/2.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/carwrap/2.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/carwrap/3.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/carwrap/3.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/carwrap/4.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/carwrap/4.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/carwrap/5.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/carwrap/5.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="videoani-port" role="tabpanel " aria-labelledby="videoani-port-tab">
                        <div class="row ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/1.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/1.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/10.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/10.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/1011.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/1011.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/11.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/11.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/3.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/3.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4 ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/4.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/4.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/5.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/5.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/6.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/6.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/7.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/7.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/8.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/8.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4 ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/9.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/9.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/1.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/1.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/10.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/10.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/2.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/2.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/3.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/3.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4 ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/4.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/4.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/5.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/5.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/6.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/6.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/7.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/7.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/8.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/8.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-4 ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/2d/9.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/2d/9.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/1.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/1.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/10.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/10.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/11.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/11.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/3.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/videoani/whiteboard/3.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="shirts-port" role="tabpanel " aria-labelledby="shirts-port-tab">
                        <div class="row ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/shirt/1.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/shirt/1.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/shirt/2.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/shirt/2.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/shirt/3.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/shirt/3.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/shirt/4.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/shirt/4.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="signage-port" role="tabpanel " aria-labelledby="signage-port-tab">
                        <div class="row ">
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/signage/1.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/signage/1.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/signage/2.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/signage/2.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/signage/3.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/signage/3.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/signage/4.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/signage/4.jpg') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-div ">
                                    <div class="portfolio-overlay-img ">
                                        <a href="{{ asset('frontend/assets/images/portfolio/signage/5.jpg') }}" data-fancybox="gallery ">
                                            <i class="fa-solid fa-magnifying-glass "></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/assets/images/portfolio/signage/5.jpg') }}" alt=" ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-button text-center mt-5 ">
                    <button>
                        <a href="# ">Explore More Here </a>
                    </button>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection