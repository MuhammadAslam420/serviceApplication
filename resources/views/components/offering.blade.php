<section class="service-section pt-0">
    <div class="container">
        <div class="row  aos" data-aos="fade-up">
            @if($offer)
            <div class="col-md-12">
                <div class="offer-paths about-offer">
                    <div class="offer-path-content">
                        <h3>{{ $offer->title }}</h3>
                        <p>{!! $offer->description !!}</p>
                        <a href="{{ $offer->link }}" class="btn btn-primary btn-views">Get Started<i class="feather-arrow-right-circle"></i></a>
                    </div>
                    <div class="offer-pathimg">
                        <img src="{{ asset('assets/imgs') }}/{{ $offer->image }}" alt="img">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>