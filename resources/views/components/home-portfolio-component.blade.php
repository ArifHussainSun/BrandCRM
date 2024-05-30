<div class="portfolio-carousel-right owl-carousel">
    @forelse($portfolietops as $portfolietop)
    <div class="item">
        <a href="{{ asset($portfolietop->popup)}}" data-fancybox="images">
            <div class="portfolio-img-hover">
                <img src="{{ asset($portfolietop->image)}}" alt="linear Logo, Real Estate, Blue and Golden, Conceptual">
                <div class="portfolio-img-hover-container">
                    <h2>Logo Design</h2>
                    <p>An unforgettable logo crafted for your brand</p>
                    <i class="icon2-icons-03"></i>
                </div>
                <div class="portfolio-industry">{{ $portfolietop->category->name }}</div>
            </div>
        </a>
    </div>
    @empty
@endforelse
</div>

<div class="portfolio-carousel owl-carousel">
    @forelse($portfoliebottoms as $portfoliebottom)
    <div class="item">
        <a href="{{ asset($portfoliebottom->popup)}}" data-fancybox="images">
            <div class="portfolio-img-hover">
                <img src="{{ asset($portfoliebottom->image)}}" alt="Abstract and Combination, Health And Care, Purple Yellow and White, Conceptual">
                <div class="portfolio-img-hover-container">
                    <h2>Logo Design</h2>
                    <p>An unforgettable logo crafted for your brand</p>
                    <i class="icon2-icons-03"></i>
                </div>
                <div class="portfolio-industry">{{ $portfoliebottom->category->name }}</div>
            </div>
        </a>
    </div>
    @empty
@endforelse
</div>