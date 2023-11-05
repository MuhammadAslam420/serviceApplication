<div>
    <div class="content">
        <div class="container">
            <div class="row">
                <x-user-sidebar />
                <!-- /Customer Menu -->


                <div class="col-md-8 col-lg-9">

                    <!-- Sort -->
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="widget-title">
                                <h4>Favorites</h4>
                            </div>
                        </div>

                        {{-- <div class="col-sm-6 d-flex align-items-center justify-content-end">
                            <div class="review-sort me-2">
                                <p>Sort</p>
                                <select class="select">
                                    <option>A -> Z</option>
                                    <option>Most helful</option>
                                </select>
                            </div>
                            <div class="grid-listview">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="assets/imgs/filter-icon.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="customer-favourite.html" class="active">
                                            <i class="feather-grid"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="customer-booking.html">
                                            <i class="feather-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /Sort -->

                    <div class="row">

                        <!-- Service List -->
                        @forelse(Cart::instance('wishlist')->content() as $item)
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="{{ route('service_detail',['slug'=>$item->model->slug]) }}">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="{{ asset('assets/imgs') }}/{{ $item->model->image }}">
                                    </a>
                                    <div class="fav-item">
                                        <a href="{{ route('category',['slug'=>$item->model->cat->slug]) }}"><span
                                                class="item-cat" style="text-transform:capitalize;">{{
                                                $item->model->cat->name }}</span></a>
                                        <a href="javascript:void(0)" class="fav-icon selected">
                                            <i class="feather-heart"
                                                wire:click.prevent='removeFromWishlist("{{ $item->rowId }}")'></i>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <a href="providers.html"><span class="item-img"><img
                                                    src="{{ asset('assets/imgs') }}/{{ $item->model->user->profile_photo_path }}"
                                                    class="avatar" alt=""></span></a>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h3 class="title">
                                        <a href="{{ route('service_detail',['slug'=>$item->model->slug]) }}">{{
                                            $item->name }}</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>{{ $item->model->city }}, {{
                                        $item->model->country->name }}<span class="rate"><i
                                                class="fas fa-star filled"></i>
                                            @if($item->model->reviews->count() > 0)
                                            {{ $item->model->reviews->sum('rating') / $item->model->reviews->count() }}
                                            @else
                                            0.0
                                            @endif
                                        </span></p>
                                    <div class="serv-info">
                                        <h6>{{ $item->price }}</h6>

                                        <button class="btn btn-book">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-12 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">

                                    <img class="img-fluid serv-img" alt="Service Image"
                                        src="{{ asset('assets/imgs/no-record.jpeg') }}">

                                </div>

                            </div>
                        </div>
                        @endforelse


                    </div>


                </div>

            </div>
        </div>


    </div>

</div>