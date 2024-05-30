@extends('frontend.layouts.master')
@section('container')
<section class="home-banner position-relative">
    <img src="{{ asset('frontend/assets/images/Dots_2.svg') }}" class="page-banner-dot" alt="">
    <img src="{{ asset('frontend/assets/images/Dots_2.svg') }}" class="page-banner-dot2" alt="">

    <div class="container absolute-main-container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="main-heading text-center">
                    <h2>Striking Logo Design & Branding Services Since Ages</span>
                    </h2>
                    <h3>Get a Custom and Proficient Logo Design from Our professional logo Designers</h3>
                </div>
                <form class="position-relative mt-4 ">
                    <i class="fa-solid fa-pencil"></i>
                    <input type="text">
                    <input type="submit" class="mt-5" value="get my custom logo">
                </form>
            </div>
        </div>
    </div>
    <div class="mouse-gif">
        <img src="{{ asset('frontend/assets/images/Group.svg') }}" alt="">
    </div>
</section>

<section class="services mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-div text-md-center text-sm-left">
                    <!-- <h5>OUR CREATIVE SERVICES</h5> -->
                    <h2 class="text-center">Logo Digitals Made Services For Startups, SMEs And Entrepreneurs</h2>
                    <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error totam enim harum eum sequi rerum suscipit expedita animi aliquid quia. Sed, maxime non est accusantium sequi omnis perferendis possimus itaque. Dolore dolorum modi
                        nihil earum!</p>
                </div>
                <!-- <select name="" class="services-select mt-4" id="tab_selector_pricing">
                        <option value="0">Custom Logo Branding</option>
                        <option value="1">Web Design & Development</option>
                        <option value="2">Brand Identity</option>
                        <option value="3">Animation & Illustration</option>
                        <option value="4">Application Development</option>
                    </select> -->
            </div>
        </div>
    </div>


    <!-- Cater -->
    <div class="grey-section mt-5">
        <div class="container">
            <div class="row">
                <div class="services-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button" role="tab" aria-controls="logo" aria-selected="true"> <img src="{{ asset('frontend/assets/images/Group 8726.svg') }}" alt="Logo">
                                <h2>Logo & Branding </h2>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="web-tab" data-bs-toggle="tab" data-bs-target="#web" type="button" role="tab" aria-controls="web" aria-selected="false"><img src="{{ asset('frontend/assets/images/Group 8725.svg') }}" alt="Logo">
                                <h2> Web Development </h2>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="online-tab" data-bs-toggle="tab" data-bs-target="#online" type="button" role="tab" aria-controls="online" aria-selected="false"><img src="{{ asset('frontend/assets/images/Group 8724.svg') }}" alt="Logo">
                                <h2> Brand Identity </h2>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ecommerce-tab" data-bs-toggle="tab" data-bs-target="#ecommerce" type="button" role="tab" aria-controls="ecommerce" aria-selected="false"><img src="{{ asset('frontend/assets/images/Group 8723.svg') }}" alt="Logo">
                                <h2>Animation & Illustration</h2>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                        <div class="row reverse-row">
                            <div class="col-md-12 col-lg-6 ">
                                <div class="content-heading mt-5 mt-0">
                                    <h3>Logo Design Services</h3>
                                    <h5>Get your brand noticed at the - First Sight.</h5>
                                    <p>Get on-board with us and witness the awesomely-filled logo design services. Be it Wordmark logo, abstract logo, 3d logo, letterform logo, pictorial mark logo, pictorial mark logo, or any other type of logo that
                                        you need to make your logo speak your business, we have build heaps of perfect logos and this is why you can absolutely depend on us.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Custom Logo Design</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Corporate Identity</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Business & Advertising</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Clothing & Merchandise</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Clothing & Merchandise</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Clothing & Merchandise</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-buttons mt-0 mt-md-4 d-flex">
                                        <a href="#">Let's Start</a>
                                        <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-5">
                                <div class="content-img">
                                    <img src="{{ asset('frontend/assets/images/Custom Logo Design.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="web" role="tabpanel" aria-labelledby="web-tab">
                        <div class="row reverse-row">
                            <div class="col-md-12 col-lg-6">
                                <div class="content-heading mt-5 mt-0">
                                    <h3>Web Design & Development</h3>
                                    <h5>Get Websites That Can Help Your Business Grow</h5>
                                    <p>Your business should pose digitally right and when it comes to the website, it should reflect your values, offering, and services in a unique way. This is how we made so many businesses conquer their industry and
                                        niches with beautiful websites. We develop websites that are poised to make your web visibility grow on a level that is unbeatable.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> HTML Informative Website</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">CMS Informative Website</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> E-Commerce Online Store</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Portal Marketplace</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-buttons mt-4 d-flex">
                                        <a href="#">view details</a>
                                        <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-5 mt-md-0">
                                <div class="content-img">
                                    <img src="{{ asset('frontend/assets/images/Web Design & Development.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="online-tab">
                        <div class="row reverse-row">
                            <div class="col-md-12 col-lg-6">
                                <div class="content-heading mt-5 mt-0">
                                    <h3>Online Marketing</h3>
                                    <h5>Result-Driven Marketing That Will Work For Your Brand</h5>
                                    <p>Are you a startup or SME looking for cost-effective marketing solutions? Online marketing is just the right choice to make. We collect all your prospect's data and develop robust digital strategies that let your
                                        brand story reach your audience.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Paid Marketing / PPC</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Search Engine Optimization</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Social Media Marketing</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Google Maps Listing</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Listing on Yellow Pages & Business Directories</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-buttons mt-4 d-flex">
                                        <a href="#">view details</a>
                                        <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-5">
                                <div class="content-img">
                                    <img src="{{ asset('frontend/assets/images/Brand Identity.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ecommerce" role="tabpanel" aria-labelledby="ecommerce-tab">
                        <div class="row reverse-row">
                            <div class="col-md-12 col-lg-6">
                                <div class="content-heading mt-5 mt-0">
                                    <h3>E-Commerce Web Solution</h3>
                                    <h5>Leverage E-Commerce And Boost Your Sales Online</h5>
                                    <p>Not getting enough sales in your physical outlet? Let us provide you the most cost-effective platform to market your business. Get a professional and responsive eCommerce website to facilitate your buyers online.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Inventory Management</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Shipment Delivery & Tracking</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Online Cart & Payment Integration</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Product Search & Reviews</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Manage Products & Catalogs</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Order Management System</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Product & Category Pages</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-buttons mt-4 d-flex">
                                        <a href="#">view details</a>
                                        <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-5">
                                <div class="content-img">
                                    <img src="{{ asset('frontend/assets/images/Animation & Illustration.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video-port-tab" role="tabpanel" aria-labelledby="video-port">
                        <div class="row reverse-row">
                            <div class="col-md-12 col-lg-6">
                                <div class="content-heading">
                                    <h3>Video Marketing</h3>
                                    <h5>Videos Your Customers Would Love To Watch</h5>
                                    <p>We help you in making your brand famous in an exciting way. Our animated videos can boost your sales and help to retain your business objectives. Indeed videos tend to attract an audience more rapidly and make them
                                        remember your business for a longer time.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Explainer Video</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">2d Animated Video</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">3d Animated Video</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content-offer">
                                                <ul>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">White Board Animated Video</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Typographic Animated Video</li>
                                                    <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check">Introductory AnimatedVideo</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-buttons mt-4 d-flex">
                                        <a href="#">view details</a>
                                        <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-5 mt-md-0">
                                <div class="content-img">
                                    <img src="{{ asset('frontend/assets/images/image.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio text-md-center mt-md-0 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-div text-center">
                    <h2>Our Portfolio Is Filled With Creativity</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla tempore ullam in aut debitis non autem quidem optio temporibus nisi nostrum odit sapiente, dolores hic distinctio error natus consequatur quisquam illo. Omnis dignissimos
                        molestias quae.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-width mt-4">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="portfolio-tabs mt-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">all</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="logodesign-tab" data-bs-toggle="tab" data-bs-target="#logodesign" type="button" role="tab" aria-controls="logodesign" aria-selected="false">logo design</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="branding-tab" data-bs-toggle="tab" data-bs-target="#branding" type="button" role="tab" aria-controls="branding" aria-selected="false">branding</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="webdesign-tab" data-bs-toggle="tab" data-bs-target="#webdesign" type="button" role="tab" aria-controls="webdesign" aria-selected="false">web design</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="videoani-tab" data-bs-toggle="tab" data-bs-target="#videoani" type="button" role="tab" aria-controls="videoani" aria-selected="false">video animation</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <x-portfolio-category-component :category="['ALL']">
                        </x-portfolio-category-component>
                    </div>
                    <div class="tab-pane fade" id="logodesign" role="tabpanel" aria-labelledby="logodesign-tab">
                        <x-portfolio-category-component :category="['Logo Design']">
                        </x-portfolio-category-component>
                    </div>
                    <div class="tab-pane fade" id="branding" role="tabpanel" aria-labelledby="branding-tab">
                        <x-portfolio-category-component :category="['Branding Collateral']">
                        </x-portfolio-category-component>
                    </div>
                    <div class="tab-pane fade" id="webdesign" role="tabpanel" aria-labelledby="webdesign-tab">
                        <x-portfolio-category-component :category="['Website Package']">
                        </x-portfolio-category-component>
                    </div>
                    <div class="tab-pane fade" id="videoani" role="tabpanel" aria-labelledby="videoani-tab">
                        <x-portfolio-category-component :category="['Video Animation']">
                        </x-portfolio-category-component>
                    </div>
                </div>
                <div class="portfolio-button px-3 mt-5 d-flex justify-content-center">
                    <button>
                        <a href="#">Explore More Here </a>
                    </button>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-div text-center">
                    <h2>Affordable Pricing</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, quisquam similique eaque voluptatibus quo quos! Eius vitae veritatis pariatur recusandae dolores. Voluptate non quod molestias!</p>
                </div>
            </div>
        </div>
        <div class="row mt-3">

            <div class="portfolio-tabs mt-4 text-align-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="logo-design-port-tab" data-bs-toggle="tab" data-bs-target="#logo-design-port" type="button" role="tab" aria-controls="logo-design-port" aria-selected="true">Logo Design</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="branding-port-tab" data-bs-toggle="tab" data-bs-target="#branding-port" type="button" role="tab" aria-controls="branding-port" aria-selected="false">Branding</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="website-port-tab" data-bs-toggle="tab" data-bs-target="#website-port" type="button" role="tab" aria-controls="website-port" aria-selected="false">Website</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="video-animation-tab" data-bs-toggle="tab" data-bs-target="#video-animation" type="button" role="tab" aria-controls="video-animation" aria-selected="false">Video Animation</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="logo-design-port" role="tabpanel" aria-labelledby="logo-design-port-tab">
                    <div class="row">
                        <x-single-product-component :category="['Award Winning']"></x-single-product-component>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Startup Logo</h5>
                                    <span class="card-title pricing-title">$95</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 4 Logo Concepts</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 6 Revision</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Custom Logo</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Vector PDF File</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> HQ PNG + JPEG</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 100% Ownership</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Basic Logo</h5>
                                    <span class="card-title pricing-title pricing-title-2">$135</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All Startup Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 6 Logo Concepts</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Unlimited Revisions</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Vector EPS file</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0 ">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Basic Logo</h5>
                                    <span class="card-title pricing-title pricing-title-2">$175</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All Professional Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Unlimited Concepts</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Unlimited Revisions</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Custom Logo</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Editable Vector AI</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="branding-port" role="tabpanel" aria-labelledby="branding-port-tab">
                    <div class="row">
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Basic Kit</h5>
                                    <span class="card-title pricing-title">$45</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Business Card</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Letterhead</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Envelope</li>

                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Startup Kit</h5>
                                    <span class="card-title pricing-title">$95</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All Basic Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 2 Social Covers</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Email Signature</li>

                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Professional Kit</h5>
                                    <span class="card-title pricing-title pricing-title-2">$175</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All Startup Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> T-Shirt</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Web Banner</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 4 Social Covers</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Signage Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Car Stickers</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Corporate Kit
                                    </h5>
                                    <span class="card-title pricing-title pricing-title-2">$325</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All Pro Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Ms Word Letterhead</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Invoice Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Flyer Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Bag Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Fax Template</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Website Banner</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="website-port" role="tabpanel" aria-labelledby="website-port-tab">
                    <div class="row">
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Html</h5>
                                    <span class="card-title pricing-title">$595</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 5 Page Static Website</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Jquery Slider Banner</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> W3C Certified HTML</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> UI Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 3 Banner Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Favicon</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> SEO Optimized</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> SEO Friendly Sitemap</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Search Engine Submission</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">CMS</h5>
                                    <span class="card-title pricing-title">$1095</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All HTML Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 5 Pages Dynamic Website</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 5 Banner Designs</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Web Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Advance UI Effects</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Analytics Integration</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> On Page Optimization</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Social Media Inte</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 4 Social Platforms</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">E-Commerce</h5>
                                    <span class="card-title pricing-title pricing-title-2">$1495</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All CMS Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Unlimited Pages</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> W3C Certified HTML</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Admin Panel Support</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Mobile Responsive Layout</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Customers Login Area</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Cart Integration</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Pay. Module Integration</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Inventory Mangement</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Unltd. Products & Cate.</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Product Reviews</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 15 Stock Images</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 8 Banner Designs</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Portal</h5>
                                    <span class="card-title pricing-title pricing-title-2">$2595</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All E-COM Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Any One</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Dating Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Job Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Professional Network</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Social Network</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Media Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Real Estate Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Medical Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> News Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Enterprise Portal</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Client/User Dashboard</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Custom Coding</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Module-wise Architecture</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Extensive Admin Panel</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Complete Deployment</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="video-animation" role="tabpanel" aria-labelledby="video-animation-tab">
                    <div class="row">
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Basic Logo</h5>
                                    <span class="card-title pricing-title">$499</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 60 seconds</li>
                                        <li>
                                            <h5>Custom Work</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Script Writing</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Professional Script</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Detail Storyboard</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Professional Voice over</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Royalty free BG & SFX</li>
                                        <li>
                                            <h5>More Features</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> File Delivered in HD 720p</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 3 round of revisions in each phase</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 4 weeks Deadline</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 100% satisfaction</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 100% Ownership Rights</li>
                                        <li>
                                            <h5>Final Files Included</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> MP4</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Startup</h5>
                                    <span class="card-title pricing-title">$799</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 60 seconds</li>
                                        <li>
                                            <h5>Custom Work</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Script Writing</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> storyboarding</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Detail illustrations</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Professional Voice over</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Royalty free BG & SFX</li>
                                        <li>
                                            <h5>More Features</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> File Delivered in HD 1080p</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Multiple Revisions in each phase</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 2 weeks Deadline</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 100% satisfaction</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 100% Ownership Rights</li>
                                        <li>
                                            <h5>Final Files Included</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> MP4, Mov</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Professional</h5>
                                    <span class="card-title pricing-title pricing-title-2">$999</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 60 seconds</li>
                                        <li>
                                            <h5>Custom Work</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Script Writing</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> storyboarding</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Detail illustrations</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Professional Voice over</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Royalty free BG & SFX</li>
                                        <li>
                                            <h5>More Features</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> File Delivered in HD 720p</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 3 round of revisions in each phase</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 3 weeks Deadline</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 100% satisfaction</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 100% Ownership Rights</li>
                                        <li>
                                            <h5>Final Files Included</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> MP4, Mov, WAV</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center mt-4 mt-md-0">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">

                                    <h5 class="card-title pricing-heading">Corporate</h5>
                                    <span class="card-title pricing-title pricing-title-2">$1499</span>
                                </div>
                                <div class="card-body pricing-body mt-4 mt-md-0">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 60 seconds</li>
                                        <li>
                                            <h5>Custom Work</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 2 Concepts + premium scriptwriting</li>

                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> storyboarding</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Detail illustrations</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Professional Voice over</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Impressive Animation</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Texturing</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Royalty free BG & SFX</li>
                                        <li>
                                            <h5>More Features</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> File Delivered in HD 1080p</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Unlimited revisions</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 6 weeks Deadline</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Dedicated Project Manager</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 100% satisfaction</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> 100% Ownership Rights</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> Source File</li>
                                        <li>
                                            <h5>Final Files Included</h5>
                                        </li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verifiied Check"> MP4, MOV, WAV, GIF</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center btn-div d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>










        </div>
    </div>
</section>

<!--banner2 taha-->
<section class="banner2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="heading-div text-center">
                <h2>Our Inventive Creative Process</h2>

            </div>
            <div class="images-div mt-3 mt-md-5">
                <div class="col-md-4">
                    <div class="creative-process-2">
                        <div class="img-div mb-md-3">
                            <img src="{{ asset('frontend/assets/images/download1.svg') }}">
                            <h5>Research</h5>
                        </div>


                        <p class="text-start text-md-center">We start by researching all about your brand, its competitors and the most possible outcomes of our effort.</p>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mt-md-0">
                    <div class="creative-process-2 creative-process-3">
                        <div class="img-div mb-md-3">
                            <img src="{{ asset('frontend/assets/images/download (7) 1.svg') }}">
                            <h5>Ideate</h5>
                        </div>

                        <p class="text-start text-md-center">The idea is to make your idea bigger and better with spot-on creative strategies. We create concepts out of future reality.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="creative-process-2 mt-5 mt-md-0 creative-process-4">
                        <div class="img-div mb-md-3">
                            <img src="{{ asset('frontend/assets/images/download (8) 1.svg') }}">
                            <h5>Launch!</h5>
                        </div>

                        <p class="text-start text-md-center">Once the strategy is done and the idea is all beefed up, we deliver you maximum results with your ROI being multiplied.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--end banner2 taha-->

<section class="why-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-div text-center mb-5">
                    <h2>Why Should You Pick Us?</h2>
                    <p class="text-start text-md-center">Our sole motto and focus is to viralize your brand among the online fraternity. Be it web design, logo design or animated videos, we deliver beyond your expectations and our prolific digital artists design your brands with sheer
                        passion marked with the emblem of extreme creative design. We’ve been digitizing businesses for years and when it comes to building the brand presence of startups, small-scale businesses, blue-chip organizations and so on,
                        we know how to take things to the next level along with the skyrocketing approach.</p>
                </div>
            </div>
        </div>
        <div class="pad-row">
            <div class="row">
                <div class="col-md-4 px-0 ">
                    <div class="box border-around">
                        <div class="box-upper d-flex">
                            <div class="icon-box d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/download (9) 1.svg') }}" alt="">
                            </div>
                            <div class="main-box">
                                <h6>Unique Design Guarantee</h6>
                                <p>Custom Designed From Scratch</p>
                            </div>
                        </div>
                        <div class="box-details">
                            <p>Every Logo is created with a unique idea that our designers, logo makers create from scratch as per your business nature</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 px-0 ">
                    <div class="box border-around">
                        <div class="box-upper d-flex">
                            <div class="icon-box d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/download (9) 1.svg') }}" alt="">
                            </div>
                            <div class="main-box">
                                <h6>Unique Design Guarantee</h6>
                                <p>Custom Designed From Scratch</p>
                            </div>
                        </div>
                        <div class="box-details">
                            <p>Every Logo is created with a unique idea that our designers, logo makers create from scratch as per your business nature</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 px-0 no-border ">
                    <div class="box ">
                        <div class="box-upper d-flex">
                            <div class="icon-box d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/download (9) 1.svg') }}" alt="">
                            </div>
                            <div class="main-box">
                                <h6>Unique Design Guarantee</h6>
                                <p>Custom Designed From Scratch</p>
                            </div>
                        </div>
                        <div class="box-details">
                            <p>Every Logo is created with a unique idea that our designers, logo makers create from scratch as per your business nature</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 px-0">
                    <div class="box one-border">
                        <div class="box-upper d-flex">
                            <div class="icon-box d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/download (9) 1.svg') }}" alt="">
                            </div>
                            <div class="main-box">
                                <h6>Unique Design Guarantee</h6>
                                <p>Custom Designed From Scratch</p>
                            </div>
                        </div>
                        <div class="box-details">
                            <p>Every Logo is created with a unique idea that our designers, logo makers create from scratch as per your business nature</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 px-0 ">
                    <div class="box one-border">
                        <div class="box-upper d-flex">
                            <div class="icon-box d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/download (9) 1.svg') }}" alt="">
                            </div>
                            <div class="main-box">
                                <h6>Unique Design Guarantee</h6>
                                <p>Custom Designed From Scratch</p>
                            </div>
                        </div>
                        <div class="box-details">
                            <p>Every Logo is created with a unique idea that our designers, logo makers create from scratch as per your business nature</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 px-0">
                    <div class="box">
                        <div class="box-upper d-flex">
                            <div class="icon-box d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/download (9) 1.svg') }}" alt="">
                            </div>
                            <div class="main-box">
                                <h6>Unique Design Guarantee</h6>
                                <p>Custom Designed From Scratch</p>
                            </div>
                        </div>
                        <div class="box-details">
                            <p>Every Logo is created with a unique idea that our designers, logo makers create from scratch as per your business nature</p>
                        </div>
                    </div>

                </div>




            </div>
            <!-- <div class="row">

                </div> -->
        </div>

    </div>
</section>


@endsection