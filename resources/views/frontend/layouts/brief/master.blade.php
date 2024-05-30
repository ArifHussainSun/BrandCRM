<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="nofollow, noindex" />
    <meta name="p:domain_verify" content="2e6bcc23643e33ab4baa38c644b96571" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Home - DesignMajesty" />
    <meta property="og:description" content="Revamp your business to stand out in the industry with the most competitive logo design company. We believe in crafting logo design that reflects the core values of your business. " />
    <meta property="og:image" content="assets/images/pixel-image.jpg" />
    <meta name="twitter:card" content="Revamp your business to stand out in the industry with the most competitive logo design company. We believe in crafting logo design that reflects the core values of your business. " />

    <!-- ==============================================
        Vendor Stylesheet
        =============================================== -->

    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/vendor/bootstrap.min.css')}}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('frontend/assets/brief/css/main.css')}}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/vendor/slider.min.css')}}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/vendor/icons.min.css')}}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/vendor/animation.min.css')}}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/vendor/gallery.min.css')}}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/fonts/fontawesome/css/all.css') }}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!-- ==============================================
        Custom Stylesheet
        =============================================== -->
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/default.css') }}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/theme-pink.css') }}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/owl/css/owl.carousel.min.css') }}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('frontend/assets/brief/css/custom.css') }}" async>
    <link rel="preload" type="text/css" href="{{ asset('frontend/assets/brief/css/progressive-image.css') }}" media="all" defer as="style" onload="this.onload=null;this.rel='stylesheet'">
    <script src="{{ asset('frontend/assets/brief/js/vendor/jquery.min.js') }}"></script>
    <link rel="canonical" href="https://www.designmajesty.com/">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($brand_settings['favicon']) }}">
    <!-- ==============================================
        Theme Settings
        =============================================== -->


    <title>@if(!empty($page->title)) {!! $page->title !!} @else Home @endif</title>

    @if(!empty($page->meta_title))
    <meta name="title" content="{{$page->meta_title}}">
    @endif
    @if(!empty($page->meta_description))
    <meta name="description" content="{{$page->meta_description}}">
    @endif
    @if(!empty($page->meta_keyword))
    <meta name="keywords" content="{{$page->meta_keyword}}">
    @endif





    @routes
    <style>
        :root {
            --header-bg-color: #f5f5f5;
            --nav-item-color: #2f323a;
            --hero-bg-color: #f5f5f5;

            --section-1-bg-color: #eeeeee;
            --section-2-bg-color: #111111;
            --section-3-bg-color: #191919;
            --section-4-bg-color: #f5f5f5;
            --section-5-bg-color: #e5e5e5;
            --section-6-bg-color: #eeeeee;
            --section-7-bg-color: #111111;
            --section-8-bg-color: #f5f5f5;
            --primary-color: #d92d2d;
            --secondary-color: #d92d2d;
            --footer-bg-color: #111111;
            --nav-brand-height: 30px;

            --primary-b-color: #fff;

            --h1-weight: 800;

            --primary-p-color: #2f323a;
        }
    </style>
    <style>
        body {
            background: #fff;
        }
    </style>
   
    @stack('customStyles')
    @if(!empty($brand_settings["customheader"]))
    {!! $brand_settings["customheader"] !!}
    @endif
</head>

<body>
    @include('frontend.layouts.brief.header')

    @yield('container')



    <!-- ==============================================
        Vendor Scripts
        =============================================== -->

    <script src="{{ asset('frontend/assets/brief/js/vendor/jquery.easing.min.js') }}" async></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/jquery.inview.min.js') }}" async></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/animation.min.js') }}" async></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/progress-radial.min.js') }}" async></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/bricklayer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/gallery.min.js') }}" async></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/shuffle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/cookie-notice.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/brief/js/main.js') }}" async></script>
    <script src="{{ asset('frontend/assets/brief/owl/js/owl.carousel.min.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/progressive-image.js/dist/progressive-image.js"></script>

    <script src="{{ asset('frontend/assets/brief/js/vendor/slider.min.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/brief/js/vendor/ponyfill.min.js') }}" async></script>


    <script>
        $(document).ready(function() {
            $('.home-banner-slider').owlCarousel({
                items: 1,
                loop: true,
                mouseDrag: false,
                touchDrag: false,
                pullDrag: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                margin: 0,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false
            });
        })


        $(document).ready(function() {
            $('.testimonials-carousel').owlCarousel({
                items: 1,
                loop: true,
                mouseDrag: false,
                touchDrag: false,
                pullDrag: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                margin: 15,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false
            });
        })
    </script>

    <script>
        $("#contact_form").on("submit", function(e) {
            e.preventDefault();
            var csrfName = $('.txt_csrfname').attr('name');
            var csrfHash = $('.txt_csrfname').val();
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            $.ajax({
                type: "POST",
                url: "home/send_mail",
                data: {
                    name: name,
                    email: email,
                    subject: subject,
                    message: message,
                    [csrfName]: csrfHash
                },
                success: function(result) {
                    console.log(result);
                    if (result == "fail") {
                        $(".error-box").css({
                            "display": "block",
                            "margin-top": "20px"
                        });
                        $(".error-box").delay(5000).fadeOut(400);
                    } else {
                        $(".success-box").css({
                            "display": "block",
                            "margin-top": "20px"
                        });
                        $(".success-box").delay(5000).fadeOut(400);
                        $("#contact_form")[0].reset();
                    }

                }
            });
        });
    </script>
    @stack('customScripts')
    @if(!empty($brand_settings["customfooter"]))
    {!! $brand_settings["customfooter"] !!}
    @endif
</body>

</html>