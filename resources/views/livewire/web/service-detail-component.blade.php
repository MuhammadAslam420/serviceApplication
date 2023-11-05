<div>
    <div class="bg-img">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg1">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg2">
        <img src="{{asset('assets/imgs/feature-bg-03.png')}}" alt="img" class="bgimg3">
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">{{ $detail->title }}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Service Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="content">

        <div class="container">
            <div class="row">

                <!-- Service Profile -->
                <div class="col-md-8">
                    <div class="serv-profile">
                        <h2>{{ $detail->title }}</h2>
                        <ul>
                            <li>
                                <span class="badge" style="text-transform: capitalize;">{{ $detail->cat->name }} | {{
                                    $detail->subcat->name }}</span>
                            </li>
                            <li class="service-map"><i class="feather-map-pin"></i> {{ $detail->city }}, {{
                                $detail->country->name }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="serv-action flex">
                        
                        {!! $shareButtons !!}
                            <ul>
                               
                            <li> <a href="#" wire:click.prevent='addToWishlist("{{ $detail->id }}","{{ $detail->title }}",{{ $detail->price }})'><i class="feather-heart"></i></a></li>
                            
                            </ul>
                       
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="service-gal">
                        <div class="row gx-2">
                            <div class="col-md-9">
                                <div class="service-images big-gallery">
                                    <img src="{{ asset('assets/imgs') }}/{{ $detail->image }}" class="img-fluid"
                                        alt="img">
                                    <a href="{{ asset('assets/imgs') }}/{{ $detail->image }}" data-fancybox="gallery"
                                        class="btn btn-show"><i class="feather-image me-2"></i>Show all photos</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @php
                                $gallery = explode(',',$detail->gallery);
                                @endphp
                                @if($gallery)
                                @foreach($gallery as $image)
                                @if($image)
                                <div class="service-images small-gallery">
                                    <a href="{{ asset('assets/imgs') }}/{{ $image }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/imgs') }}/{{ $image }}" class="img-fluid" alt="img">
                                        <span class="circle-icon"><i class="feather-plus"></i></span>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Service Profile -->
            </div>

            <div class="row">

                <!-- Service Details -->
                <div class="col-lg-8">
                    <div class="service-wrap">
                        <h5>Service Details</h5>
                        <p>{!! $detail->description !!}</p>
                    </div>
                    <div class="service-wrap provide-service">
                        <h5>Service Provider</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="provide-box">
                                    <img src="{{ asset('assets/imgs') }}/{{ $detail->user->profile_photo_path }}"
                                        class="img-fluid" alt="img">
                                    <div class="provide-info">
                                        <h6>{{ $detail->user->username }}</h6>
                                        <div class="serv-review">

                                            <span>
                                                @if ($detail->reviews->count() > 0)
                                                @php
                                                $rating = $detail->reviews->sum('rating') / $detail->reviews->count();
                                                @endphp

                                                @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <i
                                                    class="fas fa-star filled"></i>
                                                    @else
                                                    <i class="fas fa-star"></i>
                                                    @endif
                                                    @endfor

                                                    {{ number_format($rating, 1) }}
                                                    @else
                                                    0.0
                                                    @endif </span>({{ $detail->reviews->count() }} reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="provide-box">
                                    <span><i class="feather-user"></i></span>
                                    <div class="provide-info">
                                        <h6>Member Since</h6>
                                        <p>{{ \Carbon\Carbon::parse($detail->user->created_at)->isoFormat('MMM Do
                                            YYYY') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="provide-box">
                                    <span><i class="feather-map-pin"></i></span>
                                    <div class="provide-info">
                                        <h6>Address</h6>
                                        <p>{{ $detail->user->address }}, {{ $detail->user->city }}, {{
                                            $detail->user->country }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="provide-box">
                                    <span><i class="feather-mail"></i></span>
                                    <div class="provide-info">
                                        <h6>Email</h6>
                                        <p><a href="#">{{ $detail->user->email }}</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="provide-box">
                                    <span><i class="feather-phone"></i></span>
                                    <div class="provide-info">
                                        <h6>Phone</h6>
                                        <p>{{ $detail->user->mobile }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="social-icon provide-social">
                                    <ul>
                                        <li>
                                            <a href="{{ $detail->user->instagram }}" target="_blank"><i class="feather-instagram"></i> </a>
                                        </li>
                                        <li>
                                            <a href="{{ $detail->user->twitter }}" target="_blank"><i class="feather-twitter"></i> </a>
                                        </li>
                                        <li>
                                            <a href="{{ $detail->user->youtube }}" target="_blank"><i class="feather-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $detail->user->linkedin }}" target="_blank"><i class="feather-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $detail->user->facebook }}" target="_blank"><i class="feather-facebook"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Gallery</h5>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="owl-nav mynav3"></div>
                            </div>
                        </div>
                        <div class="owl-carousel gallery-slider" wire:ignore>
                            @php
                            $gallery = explode(',',$detail->gallery);
                            @endphp
                            @if($gallery)
                            @foreach($gallery as $image)
                            @if($image)
                            <div class="gallery-widget">
                                <a href="{{ asset('assets/imgs') }}/{{ $image }}" data-fancybox="gallery">
                                    <img class="img-fluid" alt="Image" src="{{ asset('assets/imgs') }}/{{ $image }}">
                                </a>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="service-wrap">
                        <h5>Video</h5>
                        <div id="background-video">
                            <a class="play-btn" data-fancybox="" href="https://www.youtube.com/watch?v=Vdp6x7Bibtk">
                                <i class="fa-solid fa-play"></i></a>
                        </div>
                    </div>
                    <div class="service-wrap">
                        <h5>Reviews</h5>
                        <ul>
                            @foreach($detail->reviews as $review)
                            <li class="review-box">
                                <div class="review-profile">
                                    <div class="review-img">
                                        <img src="{{ asset('assets/imgs') }}/{{ $review->user->profile_photo_path }}"
                                            class="img-fluid" alt="img">
                                        <div class="review-name">
                                            <h6>{{ $review->user->name }}</h6>
                                            <p>{{ \Carbon\Carbon::parse($review->created_at)->isoFormat('MMM Do YYYY')
                                                }}</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        @for($i = 0 ; $i<=$review->rating; $i++)
                                            <i class="fas fa-star filled"></i>
                                            @endfor

                                    </div>
                                </div>
                                <p>{{ $review->comments }}</p>
                                {{-- <div class="recommend-item">
                                    <a href="#"><img alt="Image" src="{{ asset('assets/imgs/reply-icon.svg') }}"
                                            class="me-2"> Reply</a>
                                    <div class="recommend-info">
                                        <p>Recommend?</p>
                                        <a href="#"><i class="feather-thumbs-up"></i> Yes</a>
                                        <a href="#"><i class="feather-thumbs-down"></i> No</a>
                                    </div>
                                </div> --}}
                            </li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="service-wrap">
                                <h5>Related Services</h5>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="owl-nav mynav"></div>
                        </div>
                    </div>
                    <div class="owl-carousel related-slider" wire:ignore>
                        @foreach($related as $ser)
                        <div class="service-widget mb-0">
                            <div class="service-img">
                                <a href="{{ route('service_detail',['slug'=>$ser->slug]) }}">
                                    <img class="img-fluid serv-img" alt="Service Image"
                                        src="{{ asset('assets/imgs') }}/{{ $ser->image }}">
                                </a>
                                <div class="fav-item">
                                    <a href="{{ route('category',['slug'=>$ser->cat->slug]) }}"><span class="item-cat"
                                            style="text-transform: capitalize;">{{ $ser->cat->name }}</span></a>
                                    <button class="fav-icon"  wire:click.prevent='addToWishlist("{{ $ser->id }}","{{ $ser->title }}",{{ $ser->price }})'>
                                        <i class="feather-heart"></i>
                                    </button>
                                </div>
                                <div class="item-info">
                                    <a href="{{ route('service-provider',['username'=>$ser->user->username]) }}"><span
                                            class="item-img"><img
                                                src="{{ asset('assets/imgs') }}/{{ $ser->user->profile_photo_path }}"
                                                class="avatar" alt=""></span></a>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('service_detail',['slug'=>$ser->slug]) }}">{{ $ser->title }}</a>
                                </h3>
                                <p><i class="feather-map-pin"></i>{{ $ser->city }}, {{ $ser->country->name }}<span
                                        class="rate">@if ($ser->reviews->count() > 0)
                                        @php
                                        $rating = $ser->reviews->sum('rating') / $ser->reviews->count();
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
                                    <h6>{{ $ser->price }}</h6>
                                    <button wire:click.prevent='addToCart("{{ $ser->id }}","{{ $ser->title }}",{{ $ser->price }})' class="btn btn-book">Book Now</button>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
                <!-- /Service Details -->

                <div class="col-lg-4 theiaStickySidebar">

                    <!-- Service Availability -->
                    <div class="card card-provide mb-0">
                        <div class="card-body">
                            <div class="provide-widget">
                                <div class="service-amount">
                                    <h5>{{ $detail->price }}</h5>
                                    <p class="serv-review"><span>@if ($detail->reviews->count() > 0)
                                        @php
                                        $rating = $detail->reviews->sum('rating') / $detail->reviews->count();
                                        @endphp
    
                                        @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <i class="fas fa-star filled"></i>
                                            @else
                                            <i class="fas fa-star"></i>
                                            @endif
                                            @endfor
    
                                            {{ number_format($rating, 1) }}
                                            @else
                                            0.0
                                            @endif</span>({{
                                        $detail->reviews->count() }} reviews)</p>
                                </div>
                                <div class="serv-proimg">
                                    <img src="{{ asset('assets/imgs') }}/{{ $detail->user->profile_photo_path }}"
                                        class="img-fluid" alt="img">
                                    <span><i class="fa-solid fa-circle-check"></i></span>
                                </div>
                            </div>
                            <div class="package-widget">
                                <h5>Other Service Packages</h5>
                                <ul>
                                    @foreach($detail->user->services as $pack)
                                    <li>{{ $pack->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="package-widget pack-service">
                                <h5>Additional Service</h5>
                                <ul>
                                    @foreach($detail->additionals as $pack)
                                    <li>
                                        <div class="add-serving">
                                            <button class="text-teal-500 m-0 p-2 bg-white" wire:click='setAdditional("{{ $pack->id }}",{{ $pack->price }},"{{ $pack->name }}")'><i class="fas fa-shopping-bag" style="font-size: 24px;"></i></button>
                                            <div class="add-serv-item">
                                                <div class="add-serv-img">
                                                    <img src="{{ asset('assets/imgs') }}/{{ $detail->image }}" alt="">
                                                </div>
                                                <div class="add-serv-info">
                                                    <h6>{{ $pack->name }}</h6>
                                                    <p><i class="feather-map-pin"></i> {{ $detail->city }}, {{
                                                        $detail->country->name }}</p>
                                                        <p> <h6>Price: <span>{{ $pack->price }}</span></h6></p>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if($detail->availabilties->count() > 0)
                            <div class="card card-available">
                                <div class="card-body">
                                    <div class="available-widget">
                                        <div class="available-info">
                                            <h5>Service Availability</h5>
                                            <ul>
                                                @foreach($detail->availabilties as $availabilty)
                                                <li>{{ $availabilty->day }}<span>{{ $availabilty->time_from }} - {{
                                                        $availabilty->time_to }}</span> </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                       
                            <button wire:click.prevent='addToCart("{{ $detail->id }}","{{ $detail->title }}",{{ $detail->price }},"{{ $detail->user_id }}")' class="btn btn-primary">Book Service</button>
                        </div>
                    </div>


                    <!-- /Service Availability -->

                </div>

            </div>
        </div>
    </div>
</div>