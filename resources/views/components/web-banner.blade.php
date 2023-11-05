<section class="hero-section-two">			
    <div class="banner-slider slider">
        @forelse($banners as $banner)
        <div class="banner">
            <img class="img-fluid" src="{{ asset('assets/imgs') }}/{{ $banner->image }}" alt="img">
            
        </div>
        @empty
        <div class="banner">
            <img class="img-fluid" src="{{ asset('assets/imgs/banner-02.jpg') }}" alt="img">
        </div>
        @endforelse
    
    </div>	
    <div class="banner-search aos" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    @forelse($banners as $key=>$banner)
                    @if($key < 1)
                    <h1>{{ $banner->title }}</span></h1>
                    <p>{{ $banner->subtitle }}</p>
                    @endif
                    @empty
                    <h1>World's Largest <span>Marketplace</span></h1>
                    <p>Search From 150 Awesome Verified Ads!</p>
                    @endforelse
                    <div class="search-box-two">
                        <form action="{{ route('search') }}" > 
                            <div class="search-input-new line">
                                <i class="bi bi-tv bficon"></i>
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control focus:outline-none focus:ring-0" placeholder="search services here?" name="searchQuery" wire:model='searchQuery'>
                                </div>
                            </div>
                            <div class="search-input-new">
                                <i class="bi bi-geo-alt bficon"></i>
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control focus:outline-none focus:ring-0" placeholder="Your Location city" name="location" wire:model='location'> 
                                    <a class="current-loc-icon current_location" href="javascript:void(0);"><i class="bi bi-geo-alt"></i></a>
                                </div>
                            </div>
                            <div class="search-btn">
                                <button class="btn search_service" type="submit"><i class="bi bi-search"></i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>