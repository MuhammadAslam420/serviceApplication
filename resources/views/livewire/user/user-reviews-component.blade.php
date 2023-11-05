<div>

    <div class="content">
        <div class="container">
            <div class="row">

                <x-user-sidebar />


                <div class="col-md-8 col-lg-9">

                    <!-- Reviews Sort -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="widget-title">
                                <h4>Reviews</h4>
                            </div>
                        </div>

                        <div class="col-sm-3 text-sm-end">
                            <div class="review-sort">
                                <p>Sort</p>
                                <select class="select" name="sort" id="sort" wire:model.live='sort'>
                                    <option value="desc">Old</option>
                                    <option value="asc">New</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 text-sm-end">
                            <div class="review-sort">
                                <p>PerPage</p>
                                <select class="select" name="perPage" id="perPage" wire:model.live='perPage'>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /Reviews Sort -->

                    <!-- Review List -->
                    @forelse ($reviews as $review)
                    <div class="review-list">
                        <div class="review-imgs">
                            <a href="{{ route('service_detail',['slug'=>$review->service->slug]) }}"><img class="rounded img-fluid"
                                    src="{{ asset('assets/imgs') }}/{{ $review->service->image }}" alt=""></a>
                        </div>
                        <div class="review-info">
                            <h5>
                                <a href="{{ route('service_detail',['slug'=>$review->service->slug]) }}">{{ $review->title }}</a>
                                <span>{{ $review->service->cat->name }}</span>
                            </h5>
                            <div class="review-user">
                                <img class="avatar rounded-circle" src="{{ asset('assets/imgs') }}/{{ $review->service->user->profile_photo_path }}"
                                    alt="">{{ $review->service->user->name }}
                                <span class="review-date">{{ \Carbon\Carbon::parse($review->created_at)->isoFormat('MMM Do YYYY') }}</span>
                            </div>
                        </div>
                        <div class="review-count">
                            <div class="rating">
                                @for($i = 0; $i<$review->rating ; $i++)
                                <i class="fas fa-star filled"></i>
                                @endfor
                            </div>
                        </div>
                        <p>{!!   $review->comments !!}</p>
                    </div> 
                    @empty
                    <div class="review-list">
                        <div class="review-imgs">
                            <img class="rounded img-fluid"
                                    src="{{ asset('assets/imgs/no-record.jpeg') }}" alt="">
                        </div>
                    </div>
                    @endforelse

                    <div class="row">
                       {{$reviews->links()}}
                    </div>
                </div>

            </div>

        </div>
    </div>


</div>