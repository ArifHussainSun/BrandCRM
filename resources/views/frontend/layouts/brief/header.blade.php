 <!-- Header -->
 <header id="header" class="step-header">

     <!-- Navbar -->
     <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
         <div class="container header">

             <!-- Navbar Brand-->
             <a class="navbar-brand" href="{{route('front.home')}}">
                 <img src="{{ asset($brand_settings['logo_white']) }}" alt="DesignMajesty" class="white-logo">
                 <img src="{{ asset($brand_settings['logo']) }}" alt="DesignMajesty" class="dark-logo">
             </a>

             <!-- Nav holder -->
             <div class="ml-auto"></div>


             <!-- Navbar Action -->
             <ul class="navbar-nav action">
                 <li class="nav-item ml-3">

                     @if(!empty($brand_settings["company_number"]))
                     <a href="tel:{{ $brand_settings['company_number'] }}" class="btn ml-lg-auto primary-button"><i class="fas fa-phone-alt"></i>{{ $brand_settings["company_number"] }}</a>
                     @endif
                 </li>
             </ul>
         </div>
     </nav>

 </header>