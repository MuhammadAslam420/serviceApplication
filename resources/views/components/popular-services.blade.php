<section class="service-section">
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <h2>Most Popular Services</h2>
                    <p>Explore the greates our services. You won’t be disappointed</p>
                </div>
                <div class="col-md-6 text-md-end aos" data-aos="fade-up">
                    <div class="owl-nav mynav1"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel popular-slider">
                    @forelse ($popularservices as $popular)
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="{{ route('service_detail',['slug'=>$popular->slug]) }}">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/services/default')}}/{{ $popular->image }}">
                            </a>
                            <div class="fav-item">
                                <a href="{{ route('category',['slug'=>$popular->cat->slug]) }}"><span class="item-cat bg-teal-500 text-light" style="text-transform: capitalize;">{{ $popular->cat->name }}</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="bi bi-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="{{ route('service-provider',['username'=>$popular->user->username]) }}"><span class="item-img"><img
                                            src="{{ asset('assets/imgs')}}/{{ $popular->user->profile_photo_path }}"
                                            class="avatar" alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="{{ route('service_detail',['slug'=>$popular->slug]) }}">{{ $popular->title }}</a>
                            </h3>
                            <p><i class="bi bi-geo-alt-fill"></i>{{ $popular->city }}, {{ $popular->country->name
                                }}<span class="rate">

                                    @if ($popular->reviews->count() > 0)
                                    @php
                                    $rating = $popular->reviews->sum('rating') / $popular->reviews->count();
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

                                </span></p>
                            <div class="serv-info">
                                <h6>{{ $popular->price }} / <span><strong>{{ $popular->duration }} </strong>Min</span></h6>
                                <a href="{{ route('service_detail',['slug'=>$popular->slug]) }}"
                                    
                                    class="btn bg-yellow-500 text-dark font-extrabold">View Detail</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="{{ route('service_detail',['slug'=>$popular->slug]) }}">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/service-04.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Car Wash</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="bi bi-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/avatar-01.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Car Repair Services</a>
                            </h3>
                            <p><i class="bi bi-geo-alt-fill"></i>Maryland City, MD, USA<span class="rate"><i
                                        class="bi bi-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$20.00<span class="old-price">$35.00</span></h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/service-05.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Cleaning</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="bi bi-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/avatar-02.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Commercial Painting Services</a>
                            </h3>
                            <p><i class="bi bi-geo-alt-fill"></i>Alabama, USA<span class="rate"><i
                                        class="bi bi-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$500.00</h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/service-06.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Computer</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="bi bi-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/avatar-03.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Computer & Server AMC Service</a>
                            </h3>
                            <p><i class="bi bi-geo-alt-fill"></i>California, USA<span class="rate"><i
                                        class="bi bi-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$80.00<span class="old-price">$96.00</span></h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/service-08.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Cleaning</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="bi bi-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/avatar-04.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Steam Car Wash</a>
                            </h3>
                            <p><i class="bi bi-geo-alt-fill"></i>Texas, USA<span class="rate"><i
                                        class="bi bi-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$500.00</h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="btn-sec aos" data-aos="fade-up">
                <a href="{{ route('services') }}" class="btn btn-primary btn-view">View All<i
                        class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
    </div>
</section>