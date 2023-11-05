<section class="blog-section pt-0">
    <div class="container">
        <div class="row">
           @if($partner)
           <div class="col-md-12 text-center aos " data-aos="fade-up">
            <div class="section-heading">
                <h2>Our Partners</h2>
                <p>{{ $partner->title }}</p>
            </div>
        </div>
        <div class="owl-carousel partners-slider aos " data-aos="fade-up">
            @php
            $images = explode(',',$partner->images);
            @endphp
            @forelse ($images as $image)
            <div class="partner-img">
                <img src="{{ asset('assets/imgs')}}/{{ $image }}" alt="img">
            </div>  
            @empty
            <div class="partner-img">
                <img src="{{ asset('assets/imgs/partner1.svg')}}" alt="img">
            </div>
            <div class="partner-img">
                <img src="{{ asset('assets/imgs/partner2.svg')}}" alt="img">
            </div>
            <div class="partner-img">
                <img src="{{ asset('assets/imgs/partner3.svg')}}" alt="img">
            </div>
            <div class="partner-img">
                <img src="{{ asset('assets/imgs/partner4.svg')}}" alt="img">
            </div>
            <div class="partner-img">
                <img src="{{ asset('assets/imgs/partner5.svg')}}" alt="img">
            </div>
            <div class="partner-img">
                <img src="{{ asset('assets/imgs/partner6.svg')}}" alt="img">
            </div>
            @endforelse
        </div>
        @endif
        </div>
    </div>
</section>