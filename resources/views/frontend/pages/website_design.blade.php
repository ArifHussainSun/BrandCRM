@extends('frontend.layouts.master')
@section('container')
<section class="page-banner d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('frontend/assets/images/Dots_2.svg') }}" class="page-banner-dot" alt="">
        <img src="{{ asset('frontend/assets/images/Dots_2.svg') }}" class="page-banner-dot2" alt="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading text-center">
                        <h2>Web Design Poised With UX & UI</span>
                        </h2>
                        <h3>Websites Empowered With Futuristic Designs And Creative Design Thinking</h3>
                        <div class="btn-div mt-5">
                            <a href="#">Get Started</a>
                            <a href="#">Pricing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="double-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-div d-flex align-items-center">
                        <img src="{{ asset('frontend/assets/images/web-design.png') }}" class="website-img" alt="">
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="heading-div">
                        <h5>Web Design</h5>
                        <h2>We Are Master Artists</h2>
                        <p>Our web design services are harnessed with a fleet of web developers who are passionate to create out of the square websites empowered with stellar web design thinking along with a vision to make your business go loud digitally.
                            We know the art of crafting websites that would gather eye rolls from your audience and with an ROI focused UX/UI design, we make websites that are bound to rake in results and right reach to your web visitors.</p>
                        <div class="btn-div mt-5 text-center text-md-start">
                            <a href="#">Get Started </a>
                            <a href="#">Live Chat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services web logo-main mt-md-5 mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-div text-center">
                        <h2>Web Design At Its Optimum Best</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, incidunt aliquid eos obcaecati consectetur nihil. Cumque ut non quisquam corporis quis sit quibusdam quia sint. Maiores sint aspernatur quam veniam suscipit atque,
                            omnis unde consequuntur temporibus, aperiam, fuga enim </p>
                    </div>
                    <div class="services-tabs mt-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="html-tab" data-bs-toggle="tab" data-bs-target="#html" type="button" role="tab" aria-controls="html" aria-selected="false"> <h2> HTML WEBSITE </h2></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cms-tab" data-bs-toggle="tab" data-bs-target="#cms" type="button" role="tab" aria-controls="cms" aria-selected="false"><h2>CMS WEBSITE </h2></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ecomm-tab" data-bs-toggle="tab" data-bs-target="#ecomm" type="button" role="tab" aria-controls="ecomm" aria-selected="false"><h2> E-COMMERCE SOLUTIONS </h2></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="bussiness-tab" data-bs-toggle="tab" data-bs-target="#bussiness" type="button" role="tab" aria-controls="bussiness" aria-selected="false"><h2>BUSINESS WEBSITE</h2></button>
                            </li>
                        </ul>
                        <div class="tab-content mt-md-5 mt-0" id="myTabContent">
                            <div class="tab-pane fade show active" id="html" role="tabpanel" aria-labelledby="html-tab">
                                <div class="row reverse-row">
                                    <div class="col-md-12 col-lg-6 mt-5 d-flex align-items-center">
                                        <div class="content-heading">
                                            <h3>HTML Website</h3>
                                            <p>Custom HTML websites to cater all your customization needs</p>
                                            <p>Pre-built templates are good but when it comes to tailor-made websites with all the right technical features. HTML websites are popular for their variety of features. We build websites from scratch and after
                                                analyzing your business and its niche, we thoroughly go through all the required list of features that your website should have.</p>
                                            
                                            <div class="btn-div mt-4 d-flex justify-content-center justify-content-md-start">
                                                <a href="#">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 mt-5">
                                        <div class="img-div">
                                            <img src="{{ asset('frontend/assets/images/HTML_WEBSITE.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cms" role="tabpanel" aria-labelledby="cms-tab">
                                <div class="row reverse-row">
                                    <div class="col-md-12 col-lg-6 mt-5 d-flex align-items-center">
                                        <div class="content-heading">
                                            <h3>HTML Website</h3>
                                            <p>Get your business recognized with various unique fonts with the Word Mark logo. This type of logo is best when it comes to getting your business recalled. It is poised to be catchy and easy to memorize. The
                                                Word Mark logo includes appealing typography elements fused with the name of your business. In this way, you can create a different and out of the box identity for your business.</p>
                                            
                                            <div class="btn-div mt-4 d-md-flex">
                                                <a href="#">Get Started</a>
                                                <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 mt-5">
                                        <div class="img-div">
                                            <img src="{{ asset('frontend/assets/images/CMS_WEBSITE.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ecomm" role="tabpanel" aria-labelledby="ecomm-tab">
                                <div class="row reverse-row">
                                    <div class="col-md-12 col-lg-6 mt-5 d-flex align-items-center">
                                        <div class="content-heading">
                                            <h3>HTML Website</h3>
                                            <p>Get your business recognized with various unique fonts with the Word Mark logo. This type of logo is best when it comes to getting your business recalled. It is poised to be catchy and easy to memorize. The
                                                Word Mark logo includes appealing typography elements fused with the name of your business. In this way, you can create a different and out of the box identity for your business.</p>
                                            
                                            <div class="btn-div mt-4 d-md-flex">
                                                <a href="#">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 mt-5">
                                        <div class="img-div">
                                            <img src="{{ asset('frontend/assets/images/E-COMMERCE_SOLUTIONS.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bussiness" role="tabpanel" aria-labelledby="bussiness-tab">
                                <div class="row reverse-row">
                                    <div class="col-md-12 col-lg-6 mt-5 d-flex align-items-center">
                                        <div class="content-heading">
                                            <h3>HTML Website</h3>
                                            <p>Get your business recognized with various unique fonts with the Word Mark logo. This type of logo is best when it comes to getting your business recalled. It is poised to be catchy and easy to memorize. The
                                                Word Mark logo includes appealing typography elements fused with the name of your business. In this way, you can create a different and out of the box identity for your business.</p>
                                            
                                            <div class="btn-div mt-4 d-md-flex">
                                                <a href="#">Get Started</a>
                                                <!-- <a href="#"> <i class="far fa-images"></i> visit portfolio</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 mt-5">
                                        <div class="img-div">
                                            <img src="{{ asset('frontend/assets/images/BUSINESS_WEBSITE.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio text-md-center mt-0">
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
        <div class="container container-width mt-4">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="portfolio-tabs mt-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">all</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="logodesign-tab" data-bs-toggle="tab" data-bs-target="#logodesign" type="button" role="tab" aria-controls="logodesign" aria-selected="false">html</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="branding-tab" data-bs-toggle="tab" data-bs-target="#branding" type="button" role="tab" aria-controls="branding" aria-selected="false">e-commerce</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="webdesign-tab" data-bs-toggle="tab" data-bs-target="#webdesign" type="button" role="tab" aria-controls="webdesign" aria-selected="false">cms</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="videoani-tab" data-bs-toggle="tab" data-bs-target="#videoani" type="button" role="tab" aria-controls="videoani" aria-selected="false">portal</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="row">
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/2.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/4.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/4.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/5.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/5.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4">
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/6.jpg')}}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/6.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="images/Assets/portfolio/website/html/7.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/7.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="images/Assets/portfolio/website/html/8.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/html/8.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="images/Assets/portfolio/website/ecom/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="images/Assets/portfolio/website/ecom/2.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/website/ecom/2.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="logodesign" role="tabpanel" aria-labelledby="logodesign-tab">
                            <div class="row">
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/2.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/4.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/4.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/5.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/5.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/6.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/6.jpg') }}" alt="">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="img-div"></div>
                                </div>
                                <div class="col">
                                    <div class="img-div"></div>
                                </div>
                                <div class="col">
                                    <div class="img-div"></div>
                                </div>
                                <div class="col">
                                    <div class="img-div"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="branding" role="tabpanel" aria-labelledby="branding-tab">
                            <div class="row">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/2.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/4.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/4.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/5.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/5.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/6.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/6.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/7.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>

                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/7.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="webdesign" role="tabpanel" aria-labelledby="webdesign-tab">
                            <div class="row">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/2.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/4.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/4.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/5.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/5.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/6.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/6.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="videoani" role="tabpanel" aria-labelledby="videoani-tab">
                            <div class="row">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/2.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/cms/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/cms/3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/4.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/4.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/5.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/5.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-md-4">
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/5.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/5.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/7.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/ecommerce/7.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/1.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="img-div">
                                        <div class="portfolio-overlay-img">
                                            <a href="{{ asset('frontend/assets/images/portfolio/webnew/html/3.jpg') }}" data-fancybox="gallery">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/portfolio/webnew/html/3.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-button mt-5 text-center">
                        <button>
                            <a href="#">Explore More Here </a>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing web">
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
                <div class="tab-content " id="myTabContent">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">
                                    
                                    <h5 class="card-title pricing-heading">HTML</h5>
                                    <span class="card-title pricing-title">$595</span>
                                </div>
                                <div class="card-body pricing-body">
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
                                <div class="btn-div d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">
                                    
                                    <h5 class="card-title pricing-heading">CMS</h5>
                                    <span class="card-title pricing-title">$1095 </span>
                                </div>
                                <div class="card-body pricing-body">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All HTML Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 5 Pages Dynamic Website</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 5 Banner Designs</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Web Design</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Advance UI Effects</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Analytics Integration</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> On Page Optimization</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Social Media Inte.</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> 4 Social Platforms</li>
                                    </ul>
                                </div>
                                <div class="btn-div d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">
                                    
                                    <h5 class="card-title pricing-heading">E-Commerce </h5>
                                    <span class="card-title pricing-title pricing-title-2">$1495</span>
                                </div>
                                <div class="card-body pricing-body">
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
                                <div class="btn-div d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0">
                            <div class="card pricing-1">
                                <div class="card-upper text-center">
                                    
                                    <h5 class="card-title pricing-heading">Portal</h5>
                                    <span class="card-title pricing-title pricing-title-2">$2595 </span>
                                </div>
                                <div class="card-body pricing-body">
                                    <ul>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> All E-COM Features Plus</li>
                                        <li> <img src="{{ asset('frontend/assets/images/check-verified.svg') }}" alt="Verified Check"> Any One:</li>
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
                                <div class="btn-div d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary order-button">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="banner2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="heading-div text-center">
                    <h2>The Awesome Web Design Process</h2>

                </div>
                <div class="images-div mt-5">
                    <div class="col-md-4">
                        <div class="creative-process-2">
                            <div class="img-div mb-md-3">
                                <img src="{{ asset('frontend/assets/images/download1.svg') }}">
                                <h5>Innovative Ideas</h5>
                            </div>


                            <p>We have experts that care the most about what you think, so they plan accordingly and turn your ideas into a product that can speak for itself.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 mt-md-0">
                        <div class="creative-process-2 creative-process-3">
                            <div class="img-div mb-md-3">
                                <img src="{{ asset('frontend/assets/images/download (7) 1.svg') }}">
                                <h5>Execution</h5>
                            </div>

                            <p>The only thing that matters is the outcome. When we know that our customers are satisfied, we create products and designs that are out of the box.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 mt-md-0">
                        <div class="creative-process-2 creative-process-4">
                            <div class="img-div mb-md-3">
                                <img src="{{ asset('frontend/assets/images/download (8) 1.svg') }}">
                                <h5>Delivery</h5>
                            </div>

                            <p>On-time delivery is our best service. We take care of your project once it's completed and keep track until it is delivered safe and according to your breif.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-div text-center mb-5">
                        <h2>Why Should You Pick Us?</h2>
                        <p>Our sole motto and focus is to viralize your brand among the online fraternity. Be it web design, logo design or animated videos, we deliver beyond your expectations and our prolific digital artists design your brands with sheer
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
                </div>
                <div class="row">
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
            </div>

        </div>
    </section>

    <x-testimonials></x-testimonials>
@endsection
    