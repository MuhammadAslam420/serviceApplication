<section class="providers-section">
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <h2>Top Providers</h2>
                    <p>Meet Our Experts</p>
                </div>
                <div class="col-md-6 text-md-end aos" data-aos="fade-up">
                    <a href="{{ route('providers') }}" class="btn btn-primary btn-view">View All<i
                            class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>
        </div>
        <div class="row  aos" data-aos="fade-up">
            @forelse ($topservices as $top)
            <div class="col-lg-3 col-sm-6">
                <div class="providerset">
                    <div class="providerset-img">
                        <a href="{{ route('service_detail',['slug'=>$top->slug]) }}">
                            <img src="{{ asset('assets/imgs/services/default')}}/{{ $top->image }}" alt="img">
                        </a>
                    </div>
                    <div class="providerset-content">
                        <div class="providerset-price">
                            <div class="providerset-name">
                                <h4><a href="{{ route('service-provider',['username'=>$top->user->username]) }}">{{ $top->user->name }}</a><i class="bi bi-check-circle"
                                        aria-hidden="true"></i></h4>
                                <span class="font-extrabold" style="text-transform: capitalize;">{{ $top->cat->name }}</span>
                            </div>
                            <div class="providerset-prices">
                                <h6>{{ $top->price }}</h6>
                            </div>
                        </div>
                        <div class="provider-rating">
                            <div class="rating">
                                @if ($top->reviews->count() > 0)
                                @php
                                $rating = $top->reviews->sum('rating') / $top->reviews->count();
                                @endphp

                                @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <i class="fas fa-star filled"></i>
                                    @else
                                    <i class="fas fa-star"></i>
                                    @endif
                                    @endfor

                                    {{ number_format($rating, 1) }}
                                    @else
                                    0.0
                                    @endif
                            </div>
                        </div>
                        <a href="{{ route('service_detail',['slug'=>$top->slug]) }}" class="btn bg-yellow-500 text-dark font-extrabold">View Detail</a>
                    </div>
                </div>
            </div>  
            @empty
            <div class="col-lg-3 col-sm-6">
                <div class="providerset">
                    <div class="providerset-img">
                        <a href="provider-details.html">
                            <img src="{{ asset('assets/imgs/provider-11.jpg')}}" alt="img">
                        </a>
                    </div>
                    <div class="providerset-content">
                        <div class="providerset-price">
                            <div class="providerset-name">
                                <h4><a href="provider-details.html">John Smith</a><i class="bi bi-check-circle"
                                        aria-hidden="true"></i></h4>
                                <span>Electrician</span>
                            </div>
                            <div class="providerset-prices">
                                <h6>$20.00<span>/hr</span></h6>
                            </div>
                        </div>
                        <div class="provider-rating">
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fa-solid fa-star-half-stroke filled"></i><span>(320)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="providerset">
                    <div class="providerset-img">
                        <a href="provider-details.html">
                            <img src="{{ asset('assets/imgs/provider-12.jpg')}}" alt="img">
                        </a>
                    </div>
                    <div class="providerset-content">
                        <div class="providerset-price">
                            <div class="providerset-name">
                                <h4><a href="provider-details.html">Michael</a><i class="bi bi-check-circle"
                                        aria-hidden="true"></i></h4>
                                <span>Carpenter</span>
                            </div>
                            <div class="providerset-prices">
                                <h6>$50.00<span>/hr</span></h6>
                            </div>
                        </div>
                        <div class="provider-rating">
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fa-solid fa-star-half-stroke filled"></i><span>(228)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="providerset">
                    <div class="providerset-img">
                        <a href="provider-details.html">
                            <img src="{{ asset('assets/imgs/provider-13.jpg')}}" alt="img">
                        </a>
                    </div>
                    <div class="providerset-content">
                        <div class="providerset-price">
                            <div class="providerset-name">
                                <h4><a href="provider-details.html">Antoinette</a><i class="bi bi-check-circle"
                                        aria-hidden="true"></i></h4>
                                <span>Cleaner</span>
                            </div>
                            <div class="providerset-prices">
                                <h6>$25.00<span>/hr</span></h6>
                            </div>
                        </div>
                        <div class="provider-rating">
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fa-solid fa-star-half-stroke filled"></i><span>(130)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="providerset">
                    <div class="providerset-img">
                        <a href="provider-details.html">
                            <img src="{{ asset('assets/imgs/provider-14.jpg')}}" alt="img">
                        </a>
                    </div>
                    <div class="providerset-content">
                        <div class="providerset-price">
                            <div class="providerset-name">
                                <h4><a href="provider-details.html">Thompson</a><i class="bi bi-check-circle"
                                        aria-hidden="true"></i></h4>
                                <span>Mechanic</span>
                            </div>
                            <div class="providerset-prices">
                                <h6>$25.00<span>/hr</span></h6>
                            </div>
                        </div>
                        <div class="provider-rating">
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fa-solid fa-star-half-stroke filled"></i><span>(95)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            @endforelse
           
        </div>
    </div>
</section>