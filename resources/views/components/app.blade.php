<section class="app-five-section">
    <div class="container">
        <div class="app-sec app-sec-five">
            @if($appl)
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="col-md-12">
                        <div class="heading aos" data-aos="fade-up">
                            <h2>Download Our App</h2>
                            <p>{{$appl->title}}</p>
                            <h6>{{ $appl->subtitle }}</h6>

                        </div>
                    </div>
                    <div class="downlaod-btn aos" data-aos="fade-up">
                        <div class="scan-img">
                            <img src="{{ asset('assets/imgs') }}/{{ $appl->qr_code }}" class="img-fluid" alt="img">
                        </div>
                        <a href="{{ $appl->google }}">
                            <img src="{{ asset('assets/imgs/googleplay-five.png') }}" alt="img">
                        </a>
                        <a href="{{ $appl->apple }}">
                            <img src="{{ asset('assets/imgs/apple-five.png') }}" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="appimg-set aos" data-aos="fade-up">
                        <img src="{{ asset('assets/imgs') }}/{{ $appl->image }}" class="img-fluid" alt="img">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>