<section class="service-section">
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <h2>Featured Services</h2>
                    <p>Explore the greates our services. You won’t be disappointed</p>
                </div>
                <div class="col-md-6 text-md-end aos" data-aos="fade-up">
                    <div class="owl-nav mynav"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel service-slider">
                    @forelse ($featuredservices as $featured)
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="{{ route('service_detail',['slug'=>$featured->slug]) }}">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/services/default')}}/{{ $featured->image }}">
                            </a>
                            <div class="fav-item">
                                <a href="{{ route('category',['slug'=>$featured->cat->slug]) }}"><span class="item-cat bg-teal-500 text-light" style="text-transform: capitalize;">
                                        @if ($featured->cat)
                                        {{ $featured->cat->name }}
                                        @endif
                                    </span>
                                </a>
                                <a href="javascript:void(0)" class="item-cat bg-pink-500 text-light" style="text-transform: capitalize;">
                                    {{ $featured->serviceType->name }}
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="{{ route('service-provider',['username'=>$featured->user->username]) }}"><span class="item-img"><img
                                            src="{{ asset('assets/imgs')}}/{{ $featured->user->profile_photo_path }}"
                                            class="avatar" alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="{{ route('service_detail',['slug'=>$featured->slug]) }}">{{ $featured->title }}</a>
                            </h3>
                            <p><i class="fas fa-geo-alt-fill"></i>{{ $featured->city }}, {{ $featured->country->name
                                }}<span class="rate">
                                    @if ($featured->reviews->count() > 0)
                                    @php
                                    $rating = $featured->reviews->sum('rating') / $featured->reviews->count();
                                    @endphp

                                    @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <i class="fas fa-star filled"></i>
                                        @else
                                        <i class="fas fa-star"></i>
                                        @endif
                                        @endfor

                                        {{ number_format($rating, 1) }}
                                        @else
                                        0.0
                                        @endif</span></p>
                            <div class="serv-info">
                                <h6>{{ $featured->price }}</h6>
                                <a href="{{ route('service_detail',['slug'=>$featured->slug]) }}}}"
                                    
                                    class="btn bg-yellow-500 text-dark font-extrabold">View Detail</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/services/default/service-01.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Cleaning</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/services/default/avatar-01.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Electric Panel Repairing Service</a>
                            </h3>
                            <p><i class="fas fa-geo-alt-fill"></i>New Jersey, USA<span class="rate"><i
                                        class="fas fa-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$25.00<span class="old-price">$35.00</span></h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/services/default/service-02.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Construction</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/services/default/avatar-02.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Toughened Glass Fitting Services</a>
                            </h3>
                            <p><i class="fas fa-geo-alt-fill"></i>Montana, USA<span class="rate"><i
                                        class="fas fa-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$45.00</h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/services/default/service-03.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Carpentry</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/services/default/avatar-03.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Wooden Carpentry Work</a>
                            </h3>
                            <p><i class="fas fa-geo-alt-fill"></i>Montana, USA<span class="rate"><i
                                        class="fas fa-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$45.00</h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-widget aos" data-aos="fade-up">
                        <div class="service-img">
                            <a href="service-details.html">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('assets/imgs/services/default/service-11.jpg')}}">
                            </a>
                            <div class="fav-item">
                                <a href="categories.html"><span class="item-cat">Construction</span></a>
                                <a href="javascript:void(0)" class="fav-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                            <div class="item-info">
                                <a href="providers.html"><span class="item-img"><img
                                            src="{{ asset('assets/imgs/services/default/avatar-04.jpg')}}" class="avatar"
                                            alt=""></span></a>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="service-details.html">Plumbing Services</a>
                            </h3>
                            <p><i class="fas fa-geo-alt-fill"></i>Georgia, USA<span class="rate"><i
                                        class="fas fa-star filled"></i>4.9</span></p>
                            <div class="serv-info">
                                <h6>$45.00</h6>
                                <a href="service-details.html" class="btn btn-book">Book Now</a>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="btn-sec aos" data-aos="fade-up">
                <a href="{{ route('services') }}" class="btn btn-primary btn-view">View All<i
                        class="fas fa-arrow-right-circle"></i></a>
            </div>
        </div>
    </div>
</section>