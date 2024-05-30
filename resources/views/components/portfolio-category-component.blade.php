@forelse($portfolies as $portfolio)
<div class="col-md-3 col-6 portfolio_div"> 
    <a href="{{ (($portfolio->category->name == "Video Animation") || ($portfolio->category->name == "Logo Animation")) ? asset($portfolio->video_link) : asset($portfolio->popup) }}" data-fancybox="images"> 
        <div class="portfolio-img-hover"> 
            <img class="lozad" data-src="{{ asset($portfolio->image)}}" alt="" src="{{ asset($portfolio->image)}}" data-loaded="true"> 
            <div class="portfolio-img-hover-container"> 
                <h2>Logo Design</h2> 
                <p>An unforgettable logo crafted for your brand</p> 
                <i class="fas fa-search-plus"></i> 
            </div> 
            <div class="portfolio-industry">{{ $portfolio->category->name }}</div> 
        </div> 
    </a> 
</div>
@empty
@endforelse
