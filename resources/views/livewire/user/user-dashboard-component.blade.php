<div>
    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Customer Menu -->
                <x-user-sidebar />
                <!-- /Customer Menu -->

                <div class="col-lg-9">
                    <div class="widget-title">
                        <h4>Dashboard</h4>
                    </div>

                    <!-- Dashboard Widget -->
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-yellow">
                                        <img src="{{ asset('assets/imgs/dash-icon-01.svg') }}" alt="image">
                                    </span>
                                    <div class="dash-value"><img src="{{ asset('assets/imgs/up-icon.svg') }}" alt="image"> 
                                        @php
                                        $bookings = DB::table('bookings')->count();
                                        @endphp
                                        @if($bookings)
                                        +{{ number_format(( Auth::user()->bookings->count() / $bookings ) * 100,2) }}%
                                        @endif
                                    </div>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h6>Total Bookings</h6>
                                        <h5>{{ Auth::user()->bookings->count() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-blue">
                                        <img src="{{ asset('assets/imgs/wallet-icon-01.svg') }}" alt="image">
                                    </span>
                                    <div class="dash-value text-danger"><img src="{{ asset('assets/imgs/down-icon.svg') }}"
                                            alt="image"> {{ number_format((Auth::user()->bookings()->where('bookingstatus','completed')->sum('total') / Auth::user()->bookings()->sum('total') ) * 100,2) - 100 }}%</div>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h6>Total Spend</h6>
                                        <h5>{{ Auth::user()->bookings()->where('bookingstatus','completed')->sum('total') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-blue">
                                        <img src="{{ asset('assets/imgs/wallet-add.svg') }}" alt="image">
                                    </span>
                                    <div class="dash-value"><img src="{{ asset('assets/imgs/up-icon.svg') }}" alt="image"> +12.10%
                                    </div>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h6>Wallet</h6>
                                        <h5>0</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dash-widget">
                                <div class="dash-img">
                                    <span class="dash-icon bg-light-danger">
                                        <img src="{{ asset('assets/imgs/wallet-amt.svg') }}" alt="image">
                                    </span>
                                    <div class="dash-value"><img src="{{ asset('assets/imgs/up-icon.svg') }}" alt="image">
                                        @php
                                        $booking_total = DB::table('bookings')->sum('total');
                                        @endphp
                                        @if($booking_total)
                                        +{{ number_format((Auth::user()->bookings()->sum('total') / $booking_total) * 100,2) }}
                                        @endif
                                    </div>
                                </div>
                                <div class="dash-info">
                                    <div class="dash-order">
                                        <h6>Total Booking Cost</h6>
                                        <h5>{{ Auth::user()->bookings()->sum('total') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Dashboard Widget -->

                    <div class="row">
                        <!-- Recent Booking -->
                        <div class="col-lg-12 d-flex flex-column">
                            <h6 class="user-title">Recent Booking</h6>
                            <div class="table-responsive recent-booking flex-fill">
                                <table class="table mb-0">
                                    <tbody>
                                        @foreach(Auth::user()->bookings()->orderBy('created_at', 'asc')->take(4)->get() as $booking)
                                        @foreach($booking->bookingItems as $item)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-m me-2"><img
                                                            class="avatar-img rounded"
                                                            src="{{ ('assets/imgs') }}/{{ $item->service->image }}"
                                                            alt="User Image"></a>
                                                    <a href="#">{{ $item->service->title }}<span><i class="feather-calendar"></i> {{\Carbon\Carbon::parse($booking->booking_date)->isoFormat('MMM Do YYYY')}}</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar table-user">
                                                    <a href="#" class="avatar avatar-m me-2"><img class="avatar-img"
                                                            src="{{ asset('assets/imgs') }}/{{ $item->service->user->profile_photo_path }}"
                                                            alt="User Image"></a>
                                                    <a href="#">
                                                        {{ $item->service->user->name }}
                                                        <span><span class="__cf_email__">{{ $item->service->user->email }}</span></span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-end">
                                               @if($booking->bookingstatus === 'pending')
                                               <a href="#" class="btn btn-light-danger">Cancel</a>
                                               @elseif($booking->bookingstatus === 'completed' || $booking->bookingstatus === 'confirmed')
                                               <a href="#" class="btn btn-light-success">Add Review</a>
                                               @elseif($booking->bookingstatus === 'cancelled')
                                               <a href="#" class="btn btn-light-warning">Add Reason</a>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /Recent Booking -->


                    </div>
                </div>

            </div>

        </div>
    </div>
</div>