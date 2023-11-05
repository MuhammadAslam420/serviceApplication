<div>
    <div class="bg-img">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg1">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg2">
        <img src="{{ asset('assets/imgs/feature-bg-03.png') }}" alt="img" class="bgimg3">
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Search Results</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Available Search Results</li>
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

                <!-- Filter -->
                <div class="col-lg-3 col-sm-12 theiaStickySidebar">
                    <div class="filter-div">
                        <div class="filter-head">
                            <h5>Filter by</h5>
                            <a href="#" class="reset-link">Reset Filters</a>
                        </div>
                        <x-default-search />
                        <x-default-categories :categories="$categories" />
                        <x-default-by-type :types="$types" />
                        <x-default-location />
                        <x-default-price :minprice="$minprice" :maxprice="$maxprice" />

                    </div>
                </div>
                <!-- /Filter -->

                <!-- Service -->
                <div class="col-lg-9 col-sm-12">
                    <div class="row sorting-div">
                        <div class="col-lg-4 col-sm-12 ">
                            <div class="count-search">
                                <h6>Display {{ $services->count() }} Services</h6>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12 d-flex justify-content-end ">
                            <x-advance-sorting />
                            <x-default-sorting />
                            <x-default-page-size />
                            <div class="grid-listview">
                                <ul>
                                    <li>
                                        <a href="#" wire:click="switchToGridView"
                                            class="{{ $viewMode === 'grid' ? 'active' : '' }}">
                                            <i class="feather-grid"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click="switchToListView"
                                            class="{{ $viewMode === 'list' ? 'active' : '' }}">
                                            <i class="feather-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="services-container" class="{{ $viewMode === 'list' ? 'list-view' : 'grid-view' }}">
                        <!-- Service List -->
                        @if ($viewMode === 'grid')
                        <div class="row">

                            @forelse ($services as $service)
                            <div class="col-xl-4 col-md-6">
                                <div class="service-widget servicecontent">
                                    <div class="service-img">
                                        <a href="{{ route('service_detail',['slug'=>$service->slug]) }}" wire:click='countViews("{{ $service->id }}")'>
                                            <img class="img-fluid serv-img" alt="Service Image"
                                                src="{{ asset('assets/imgs') }}/{{ $service->image }}">
                                        </a>
                                        <div class="fav-item">
                                            <a
                                                href="{{ route('category', ['slug' => $service->cat->slug, 'subCategorySlug' => $service->subcat->slug,]) }}"><span
                                                    class="item-cat bg-indigo-600 text-light"
                                                    style="text-transform: capitalize;">{{ $service->serviceType->name
                                                    }}</span></a>
                                            <a href="javascript:void(0)"
                                                class="item-cat p-1 bg-danger text-light font-extrabold"
                                                style="text-transform: capitalize;">
                                                {{ $service->featured }}
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <a
                                                href="{{ route('service-provider',['username'=>$service->user->name]) }}"><span
                                                    class="item-img"><img
                                                        src="{{ asset('assets/imgs') }}/{{ $service->user->profile_photo_path }}"
                                                        class="avatar" alt=""></span></a>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h3 class="title">
                                            <a href="{{ route('service_detail',['slug'=>$service->slug]) }}" wire:click='countViews("{{ $service->id }}")'>{{
                                                $service->title }}</a>
                                        </h3>
                                        <p><i class="feather-map-pin"></i>{{ $service->city }}, {{
                                            $service->country->name }}
                                            <a
                                                href="{{ route('category', ['slug' => $service->cat->slug, 'subCategorySlug' => $service->subcat->slug,]) }}"><span
                                                    class="item-cat" style="text-transform: capitalize;">{{
                                                    $service->subcat->name }}</span></a>
                                        </p>
                                        <p>
                                            <span class="rate"> @if ($service->reviews->count() > 0)
                                                @php
                                                $rating = $service->reviews->sum('rating') / $service->reviews->count();
                                                @endphp

                                                @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <i
                                                    class="fas fa-star filled"></i>
                                                    @else
                                                    <i class="fas fa-star"></i>
                                                    @endif
                                                    @endfor

                                                    {{ number_format($rating, 1) }}
                                                    @else
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    0.0
                                                    @endif</span>
                                        </p>
                                        <div class="serv-info">
                                            <h6>{{ $service->price }}/ <span
                                                    class="font-extrabold text-[15px] text-teal-600">{{
                                                    $service->duration }} Min</span></h6>

                                        </div>

                                        <div class="serv-info">
                                            <a href="{{ route('service_detail',['slug'=>$service->slug]) }}"  class="btn bg-yellow-400 text-light font-extrabold hover:bg-teal-500">View Detail</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-xl-4 col-md-6">
                                <div class="service-widget servicecontent">
                                    <div class="service-img">
                                        <a href="#">
                                            <img class="img-fluid serv-img" alt="Service Image"
                                                src="{{ asset('assets/imgs/no-record.jpeg') }}">
                                        </a>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- /Service List -->
                            @endforelse
                        </div>
                        @endif
                        @if ($viewMode === 'list')
                        <div class="row">
                            <div class="col-md-12">

                                <!-- Service List -->
                                @forelse ($services as $service)
                                <div class="service-list">
                                    <div class="service-cont">
                                        <div class="service-cont-img">
                                            <a href="{{ route('service_detail',['slug'=>$service->slug]) }}" wire:click='countViews("{{ $service->id }}")'>
                                                <img class="img-fluid serv-img" alt="Service Image"
                                                    src="{{ asset('assets/imgs') }}/{{ $service->image }}">
                                            </a>
                                            <div class="fav-item">
                                                <span class="item-cat bg-danger text-light hover:bg-warning"
                                                    style="text-transform: capitalize;">{{ $service->featured }}</span>
                                            </div>
                                        </div>
                                        <div class="service-cont-info">
                                            <a href="@"><span class="item-cat bg-indigo-700 text-light">{{
                                                    $service->serviceType->name }}</span></a>
                                            <a href="#"><span class="item-cat">{{ $service->subcat->name }}</span></a>
                                            <h3 class="title">
                                                <a href="{{ route('service_detail',['slug'=>$service->slug]) }}" wire:click='countViews("{{ $service->id }}")'>{{
                                                    $service->title }}</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i>{{ $service->city }}, {{
                                                $service->country->name }}</p>
                                            <div class="service-pro-img">
                                                <img src="{{ asset('assets/imgs') }}/{{ $service->user->profile_photo_path }}"
                                                    alt="user">
                                                <span>@if ($service->reviews->count() > 0)
                                                    @php
                                                    $rating = $service->reviews->sum('rating') /
                                                    $service->reviews->count();
                                                    @endphp

                                                    @for ($i = 0; $i < 5; $i++) @if ($i < $rating) <i
                                                        class="fas fa-star filled"></i>
                                                        @else
                                                        <i class="fas fa-star"></i>
                                                        @endif
                                                        @endfor

                                                        {{ number_format($rating, 1) }}
                                                        @else
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        0.0
                                                        @endif</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-action">
                                        <h6>{{ $service->price }} / <span>{{ $service->duration }} Min</span></h6>
                                     
                                        <a href="{{ route('service_detail',['slug'=>$service->slug]) }}"  class="btn bg-yellow-400 text-light font-extrabold hover:bg-teal-500">View Detail</a>
                                       
                                    </div>
                                  
                                </div>
                                @empty
                                <!-- /Service List -->

                                <!-- Service List -->
                                <div class="service-list">
                                    <div class="service-cont">
                                        <div class="service-cont-img">
                                            <a href="#">
                                                <img class="img-fluid serv-img" alt="Service Image"
                                                    src="{{ asset('assets/imgs/service-02.jpg') }}">
                                            </a>
                                            <div class="fav-item">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="feather-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="service-cont-info">
                                            <span class="item-cat">Construction</span>
                                            <h3 class="title">
                                                <a href="#">Toughened Glass Fitting Services</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i>New Jersey, USA</p>
                                            <div class="service-pro-img">
                                                <img src="{{ asset('assets/imgs/avatar-02.jpg') }}" alt="User">
                                                <span><i class="fas fa-star filled"></i>4.9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-action">
                                        <h6>$30.00<span class="old-price">$35.00</span></h6>
                                        <a href="booking.html" class="btn btn-secondary">Book Now</a>
                                    </div>
                                </div>
                                <!-- /Service List -->

                                <!-- Service List -->
                                <div class="service-list">
                                    <div class="service-cont">
                                        <div class="service-cont-img">
                                            <a href="#">
                                                <img class="img-fluid serv-img" alt="Service Image"
                                                    src="{{ asset('assets/imgs/service-06.jpg') }}">
                                            </a>
                                            <div class="fav-item">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="feather-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="service-cont-info">
                                            <span class="item-cat">Computer</span>
                                            <h3 class="title">
                                                <a href="#">Computer & Server AMC Service</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i>California, USA</p>
                                            <div class="service-pro-img">
                                                <img src="{{ asset('assets/imgs/avatar-05.jpg') }}" alt="User">
                                                <span><i class="fas fa-star filled"></i>4.9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-action">
                                        <h6>$30.00<span class="old-price">$35.00</span></h6>
                                        <a href="booking.html" class="btn btn-secondary">Book Now</a>
                                    </div>
                                </div>
                                <!-- /Service List -->

                                <!-- Service List -->
                                <div class="service-list">
                                    <div class="service-cont">
                                        <div class="service-cont-img">
                                            <a href="#">
                                                <img class="img-fluid serv-img" alt="Service Image"
                                                    src="{{ asset('assets/imgs/service-07.jpg') }}">
                                            </a>
                                            <div class="fav-item">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="feather-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="service-cont-info">
                                            <span class="item-cat">Interior</span>
                                            <h3 class="title">
                                                <a href="#">Interior Designing</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i>Maryland, USA</p>
                                            <div class="service-pro-img">
                                                <img src="{{ asset('assets/imgs/avatar-06.jpg') }}" alt="User">
                                                <span><i class="fas fa-star filled"></i>4.9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-action">
                                        <h6>$15.00<span class="old-price">$25.00</span></h6>
                                        <a href="booking.html" class="btn btn-secondary">Book Now</a>
                                    </div>
                                </div>
                                <!-- /Service List -->

                                <!-- Service List -->
                                <div class="service-list">
                                    <div class="service-cont">
                                        <div class="service-cont-img">
                                            <a href="#">
                                                <img class="img-fluid serv-img" alt="Service Image"
                                                    src="{{ asset('assets/imgs/service-09.jpg') }}">
                                            </a>
                                            <div class="fav-item">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="feather-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="service-cont-info">
                                            <span class="item-cat">Cleaning</span>
                                            <h3 class="title">
                                                <a href="#">House Cleaning Services</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i>Georgia</p>
                                            <div class="service-pro-img">
                                                <img src="{{ asset('assets/imgs/avatar-09.jpg') }}" alt="User">
                                                <span><i class="fas fa-star filled"></i>4.9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-action">
                                        <h6>$55.00<span class="old-price">$60.00</span></h6>
                                        <a href="booking.html" class="btn btn-secondary">Book Now</a>
                                    </div>
                                </div>
                                <!-- /Service List -->

                                <!-- Service List -->
                                <div class="service-list">
                                    <div class="service-cont">
                                        <div class="service-cont-img">
                                            <a href="#">
                                                <img class="img-fluid serv-img" alt="Service Image"
                                                    src="assets/imgs/service-10.jpg">
                                            </a>
                                            <div class="fav-item">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="feather-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="service-cont-info">
                                            <span class="item-cat">Construction</span>
                                            <h3 class="title">
                                                <a href="#">Building Construction Services</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i>Montana, USA</p>
                                            <div class="service-pro-img">
                                                <img src="{{ asset('assets/imgs/avatar-09.jpg') }}" alt="User">
                                                <span><i class="fas fa-star filled"></i>4.9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-action">
                                        <h6>$45.00<span class="old-price">$50.00</span></h6>
                                        <a href="booking.html" class="btn btn-secondary">Book Now</a>
                                    </div>
                                </div>
                                <!-- /Service List -->
                                @endforelse

                            </div>
                        </div>
                        @endif

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="blog-pagination rev-page">
                                    {{$services->links()}}
                                </div>
                            </div>
                        </div>
                        <!-- /Pagination -->

                    </div>


                </div>
            </div>
        </div>
    </div>
   

   