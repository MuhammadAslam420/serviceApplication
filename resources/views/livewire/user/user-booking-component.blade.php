<div>
    <div class="content">
        <div class="container">
            <div class="row">
                <x-user-sidebar />
                <div class="col-md-8 col-lg-9">

                    <!-- Sort -->
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="widget-title">
                                <h4>Booking List</h4>
                            </div>
                        </div>

                        <div class="col-md-8 d-flex align-items-center justify-content-md-end flex-wrap">
                            <div class="review-sort me-2">
                                <select class="form-control" name='sort' id='sort' wire:model.live='sort'>
                                    <option value="default">Default</option>
                                    <option value="date_desc">New to Old</option>
                                    <option value="date_asc">Old to New</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="grid-listview">
                                <ul>
                                    <li>
                                        <input type="date" name="sort_date" id="sort_date"
                                            class="form-control rounded-lg border border-light"
                                            wire:model.live='sort_date'>
                                    </li>

                                    <li>
                                        <select class="form-control" name='perPage' id='perPage'
                                            wire:model.live='perPage'>
                                            <option value="1">1</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                            <option value="16">16</option>
                                            <option value="24">24</option>
                                            <option value="32">32</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Sort -->

                    <!-- Booking List -->
                    @forelse ($bookings as $booking )
                    <div class="border border-dark rounded-lg p-1">
                        @foreach($booking->bookingItems as $book)
                        <div class="booking-list">
                            <div class="booking-widget">
                                <div class="booking-img">
                                    <a href="{{ route('service_detail',['slug'=>$book->service->slug]) }}">
                                        <img src="{{ asset('assets/imgs') }}/{{ $book->service->image }}"
                                            alt="User Image">
                                    </a>
                                    <div class="fav-item">
                                        <a class="fav-icon">
                                            {{ $booking->id }}
                                        </a>
                                    </div>
                                </div>
                                <div class="booking-det-info">
                                    <h3>
                                        <a href="{{ route('service_detail',['slug'=>$book->service->slug]) }}">{{
                                            $book->service->cat->name }} </a>
                                        @if($booking->bookingstatus === 'completed')
                                        <span class="badge bg-success" style="text-transform: capitalize;">{{
                                            $booking->bookingstatus }}</span>
                                        @elseif($booking->bookingstatus === 'confirmed')
                                        <span class="badge bg-warning" style="text-transform: capitalize;">{{
                                            $booking->bookingstatus }}</span>
                                        @elseif ($booking->bookingstatus === 'pending')
                                        <span class="badge bg-primary" style="text-transform: capitalize;">{{
                                            $booking->bookingstatus }}</span>
                                        @else
                                        <span class="badge bg-danger" style="text-transform: capitalize;"> {{
                                            $booking->bookingstatus }}</span>
                                        @endif
                                    </h3>
                                    <ul class="booking-details">
                                        <li>
                                            <span class="book-item">Booking Date</span> : {{
                                            \Carbon\Carbon::parse($booking->booking_date)->isoFormat("MMM Do YYYY") }},
                                            {{ \Carbon\Carbon::parse($booking->booking_time)->isoFormat("h:mm:s A") }}
                                        </li>
                                        <li>
                                            <span class="book-item">Amount</span> : {{ $book->price }} <span
                                                class="badge-grey" style="text-transform: capitalize;">{{
                                                $booking->transaction->payment_mode }}</span>
                                        </li>
                                        <li>
                                            <span class="book-item">Location</span> : {{ $booking->address }}, {{
                                            $booking->city }}, {{ $booking->country }}
                                        </li>
                                        <li>
                                            <span class="book-item">Service Provider</span> :
                                            <div class="user-book">
                                                <div class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ asset('assets/imgs') }}/{{ $book->provider->profile_photo_path }}">
                                                </div>
                                                {{ $book->provider->name }}
                                            </div>
                                            <p><a href="#"><i class="fas fa-envelope"></i> {{ $book->provider->email
                                                    }}</a>
                                            </p>
                                            <p><i class="fas fa-phone"></i> {{ $book->provider->mobile }}</p>
                                        </li>
                                        @if($book->additional_service_id != null)
                                        <li>
                                            <span class="book-item">
                                                Additional Services
                                            </span>
                                            @php
                                            $Ids = explode(',',$book->additional_service_id)

                                            @endphp
                                            @if($Ids)
                                            @foreach($Ids as $id)
                                            @php
                                            $additional = DB::table('additional_services')->find($id);
                                            @endphp
                                            <p><span>{{ $additional->name }}</span>
                                                price: <span>{{ $additional->price }}</span></p>
                                            @endforeach
                                            @endif

                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            @if($booking->bookingstatus === 'completed')
                            <div class="booking-action">
                                <a href="{{ route('service_detail',['slug'=>$book->service->slug]) }}"
                                    class="btn btn-secondary">Reschedule</a>
                            </div>
                                @endif

                            </div>
                           
                        @endforeach
                        <div>
                            <ul>
                                <li class="flex p-1">
                                    <p class="text-[15px] mr-1 font-extrabold">Subtotal : {{ $booking->subtotal }}</p>
                                    <p class="text-[15px] ml-2 font-extrabold">Discount : {{ $booking->discount }}</p>
                                    <p class="text-[15px] ml-2 font-extrabold">Tax : {{ $booking->tax }}</p>
                                    <p class="text-[15px] ml-2 font-extrabold">Grand Total : {{ $booking->total }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @empty
                    <div class="booking-list">
                        <div class="booking-widget">
                            <div class="booking-img">
                                <img src="{{ asset('assets/imgs/no-record.jpeg') }}" alt="User Image">
                            </div>

                        </div>
                    </div>
                    @endforelse


                    <!-- Pagination -->
                    <div class="row">
                        {{$bookings->links()}}
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>