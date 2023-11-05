<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Booking Details</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-light" href="{{ route('admin.bookings') }}"><i
                                    class="fas fa-trash text-pink-700"></i> Back Bookings</a>
                        </li>
                        {{-- @if($booking->bookingstatus ==='pending')
                        <li>
                            <button class="btn btn-primary">Confirmed</button>

                        </li>
                        <li>
                            <button class="btn btn-success">Compelted</button>
                            
                        </li>
                        <li>
                            <button class="btn btn-danger">Cancelled</button>
                            
                        </li>
                        @elseif($booking->bookingstatus === 'confirmed')
                        <li>
                            <button class="btn btn-success">Compelted</button>
                            
                        </li>
                        <li>
                            <button class="btn btn-danger">Cancelled</button>
                            
                        </li>
                        @elseif($booking->bookingstatus === 'completed')
                        <li>
                            <span class="btn btn-danger">Congratulation Booking is completed</span>
                            
                        </li>
                        @endif --}}

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Booking Details -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Booking Information
                                </div>
                                <div class="card-body">
                                    <p>Booking ID: {{ $booking->id }}</p>
                                    <p>Booking Date: {{
                                        \Carbon\Carbon::parse($booking->booking_date)->isoFormat('MMM Do YYYY')
                                        }}</p>
                                    <p>Booking Time: {{$booking->booking_time}}</p>
                                    <p>Status: <span class="badge badge-primary">{{
                                            Str::ucfirst($booking->bookingstatus) }}</span></p>
                                    <p>Tax: <span class="badge badge-primary">{{ Str::ucfirst($booking->tax)
                                            }}</span></p>
                                    <p>Discount: <span class="badge badge-dark">{{
                                            Str::ucfirst($booking->discount) }}</span></p>
                                    <p>SubTotal: <span class="badge badge-info">{{
                                            Str::ucfirst($booking->subtotal) }}</span></p>
                                    <p>Grand Total: <span class="badge badge-success">{{
                                            Str::ucfirst($booking->total) }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Customer Information
                                </div>
                                <div class="card-body">
                                    <p>Customer: {{ $booking->user->name }}</p>
                                    <p>Mobile: {{ $booking->mobile }}</p>
                                    <p>Email: {{$booking->email}}</p>
                                    <p>Zipcode: <span class="badge badge-primary">{{
                                            Str::ucfirst($booking->zipcode) }}</span></p>
                                    <p>City: <span class="badge badge-primary">{{ Str::ucfirst($booking->city)
                                            }}</span></p>
                                    <p>State: <span class="badge badge-primary">{{ Str::ucfirst($booking->state)
                                            }}</span></p>
                                    <p>Country: <span class="badge badge-primary">{{
                                            Str::ucfirst($booking->country) }}</span></p>
                                    <p>Address: {{ Str::ucfirst($booking->address) }}</span></p>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Items -->
                    <div class="card">
                        <div class="card-header">
                            Booking Items
                        </div>
                        <div class="card-body">
                            <!-- Display Booking Items Here -->
                            <ul>
                                @foreach($booking->bookingItems as $key => $item)
                                <li>
                                    <div>

                                        <p>
                                            <img src="{{ asset('assets/imgs/services/default') }}/{{ $item->service->image }}"
                                                width="90" class="img-thumbnail" alt="">
                                        </p>
                                        <p>{{ Str::ucfirst($item->service->title) }} <span>Cost : {{ $item->price
                                                }}</span> <span>Qty :{{ $item->qty }}</span></p>
                                        @if($item->additional_service_id)

                                        @php
                                        $ids = explode(',',$item->additional_service_id);
                                        $additionals = DB::table('additional_services')->whereIn('id',$ids)->get();
                                        @endphp
                                        <div>
                                            <h1>Additional Services</h1>
                                            @foreach ($additionals as $add)
                                            <p>{{ $add->name }} <span>Cost : {{ $add->price }}</span></p>
                                            @endforeach
                                        </div>
                                        @endif

                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                    <!-- Transactions -->
                    <div class="card">
                        <div class="card-header">
                            Transactions
                        </div>
                        <div class="card-body">
                            <p>Transaction ID: {{ $booking->transaction->id }}</p>
                            <p>Payment Method: {{ Str::ucfirst($booking->transaction->payment_mode) }}</p>
                            <p>Total Amount: {{ $booking->transaction->total }}</p>
                            <p>Status : <span class="active">{{ Str::ucfirst($booking->transaction->status) }}</span></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>