<div>
    <div class="bg-img">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg1">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg2">
        <img src="{{ asset('assets/imgs/feature-bg-03.png') }}" alt="img" class="bgimg3">
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="booking-service">
                    <div class="row">

                        @if(Cart::instance('cart')->count() > 0)
                        @foreach(Cart::instance('cart')->content() as $item)
                        <div class="col-lg-8">
                            <h5 class="pay-title">Booking Summary</h5>
                            <div class="summary-box">
                                <div class="booking-info">
                                    <div class="service-book">
                                        <div class="service-book-img">
                                            <img src="{{ asset('assets/imgs/services/default') }}/{{ $item->model->image }}" alt="img">
                                        </div>
                                        <div class="serv-profile">
                                            <span class="badge">{{ $item->model->cat->name }}</span>
                                            <h2>{{ $item->name }}</h2>
                                            <ul>
                                                <li class="serv-pro">
                                                    <img src="{{ asset('assets/imgs') }}/{{ $item->model->user->profile_photo_path }}"
                                                        alt="img">
                                                </li>
                                                <li class="serv-review"><i class="fa-solid fa-star"></i> <span>
                                                        @if($item->model->reviews->count() > 0)
                                                        {{ $item->model->reviews->sum('rating') /
                                                        $item->model->reviews->count() }}
                                                        @else
                                                        0.0
                                                        @endif
                                                    </span>({{ $item->model->reviews->count() }} reviews)</li>
                                                <li class="service-map"><i class="feather-map-pin"></i> {{
                                                    $item->model->city }}, {{ $item->model->country->name }}
                                                </li>
                                            </ul>
                                        </div>
                                     
                                    </div>
                                </div>
                                <div class="booking-summary">
                                    <ul class="booking-date flex justify-between">
                                        @foreach($item->model->availabilties as $avail)
                                        <li>
                                            <p class="text-[22px]"> <strong style="text-transform: capitalize;">{{
                                                    $avail->day }}</strong></p>
                                            <p class="text-[22px]"> <strong>{{ $avail->time_from }} - {{
                                                    $avail->time_to }}</strong></p>
                                        </li>
                                        @endforeach


                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class="pay-title">Payment Summary</h5>
                            @if(Session::has('checkout'))
                            <ul class="booking-date">
                                <li>Subtotal <span>{{Session::get('checkout')['subtotal']}}</span></li>
                                <li>Coupoun Discount <span>{{Session::get('checkout')['discount']}}</span>
                                </li>
                                <li>Tax Charges<span>{{Session::get('checkout')['tax']}}</span></li>
                                <li>
                                    Total <span>{{Session::get('checkout')['total']}}</span>
                                </li>
                            </ul>
                            @endif
                        </div>
                        @endforeach
                        @endif

                    </div>
                   <form wire:submit.prevent="placeBooking">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-control" for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            wire:model='email'>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-control" for="mobile">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control"
                                            wire:model='mobile'>
                                            @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control" wire:model='city'>
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="country">Country</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            wire:model='country'>
                                            @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="zipcode">ZipCode</label>
                                        <input type="text" name="zipcode" id="zipcode" class="form-control"
                                            wire:model='zipcode'>
                                            @error('zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-control" for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            wire:model='address'>
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>
                                </div>
                                @if($payment ==='card')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-control" for="name">Name on Card</label>
                                        <input class="form-control" type="text" placeholder="Enter Name on Card" name="name" wire:model='name'>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control" for="number">Card Number</label>
                                        <input class="form-control" placeholder="**** **** **** ****" type="text" name="number" wire:model='number'>
                                        @error('number')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control" >&nbsp;</label>
                                        <img src="{{ asset('assets/imgs/payment-card.png') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control" for="expiry_month">Expiration Month</label>
                                        <input class="form-control" placeholder="MM" type="text" name='expiry_month' wire:model='expiry_month'>
                                        @error('expiry_month')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="expiry_year">Expiration Year</label>
                                        <input class="form-control" placeholder="YY" type="text" name='expiry_year' wire:model='expiry_year'>
                                        @error('expiry_year')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control" for="cvc">Security code</label>
                                        <input class="form-control" placeholder="CVV" type="text" name="cvc" wire:model='cvc'>
                                        @error('cvc')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>
                                </div>
                                @elseif($payment ==='jazzcash')
                                <div class="col-md-12 bg-yellow-500 text-[16px] p-1">
                                    You can send payment on this Jazzcash Wallet and after that share your
                                        transaction
                                        message on this whatsapp. After confirmation your payment
                                        updated.
                                </div>
                                @elseif($payment ==='easypaisa')
                                <div class="col-md-12 bg-sky-500 text-[16px] p-1">
                                    You can send payment on this EasyPaisa Wallet and after that share your
                                        transaction
                                        message on this whatsapp. After confirmation your payment
                                        updated.
                                </div>
                                @elseif($payment ==='cod')
                                <div class="col-md-12">
                                    You can send payment on this Cash on Spot and after that share your transaction
                                        message on this whatsapp. After confirmation your payment
                                        updated.
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="book-title">
                                <h5>Appointment Date</h5>
                            </div>
                            <div class="form-group">
                                <input type="date" name="booking_date" wire:model="booking_date"
                                    class="form-control rounded-lg border-2 border-light" wire:model='booking_date'>
                                    @error('booking_date')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="book-title">
                                    <h5>Appointment Time</h5>
                                </div>
                            </div>
                            <div class="form-group ">
                                <input type="time" class="form-control rounded-lg border-2 border-light"
                                    name="booking_time" id="booking_time" wire:model='booking_time'>
                                    @error('booking_time')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                            </div>
                            <div class="col-lg-12">
                                <h5 class="pay-title">Payment Methods</h5>
                                <div class="form-group">
                                    <label class="custom_radio">
                                        <input type="radio" name="payment" wire:model.live="payment" value="jazzcash"
                                            class="card-payment">
                                        <span class="checkmark"></span>
                                        <h6>Jazzcash</h6>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label class="custom_radio">
                                        <input type="radio" name="payment" wire:model.live="payment" value="easypaisa"
                                            class="card-payment">
                                        <span class="checkmark"></span>
                                        <h6>EasyPaisa</h6>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label class="custom_radio">
                                        <input type="radio" name="payment" wire:model.live="payment" value="cod"
                                            class="card-payment">
                                        <span class="checkmark"></span>
                                        <h6>Cash On Delivery</h6>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label class="custom_radio credit-card-option">
                                        <input type="radio" name="payment" wire:model.live="payment" value="card"
                                            class="card-payment">
                                        <span class="checkmark"></span>
                                        <h6>Credit / Debit Card</h6>
                                    </label>

                                </div>
                            </div>



                            <div class="book-submit text-end">
                                <button type="submit" class="btn btn-primary">Book Appointment</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>