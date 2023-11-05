<div>
	<!-- Breadcrumb -->
	<div class="breadcrumb-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-12">
					<h2 class="breadcrumb-title">My Cart</h2>
					<nav aria-label="breadcrumb" class="page-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">My Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- /Breadcrumb -->

	<div class="content p-0">

		<!-- About -->
		<div class="about-sec">
			<div class="container">
				<div class="row align-items-center">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>SrNo</th>
									<th>Service</th>
									<th>Qty</th>
									<th>Cost</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@if(Cart::instance('cart')->count() > 0)
								@php $i = 1; @endphp
								@foreach(Cart::instance('cart')->content() as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td>
										<div>
											<p>
												<img class="rounded-full w-20 h-20 border-2 border-teal-700"
													src="{{ asset('assets/imgs/services/default') }}/{{ $item->model->image }}" alt="">
												<span>{{ $item->name }}</span>
											</p>
											<p>
												@if ($additionalServices = $item->options['additional_services'] ?? [])
												@foreach ($additionalServices as $additionalService)

											<div>
												<p class="text-muted">
													<span class="font-weight-bold">Additional Service:</span>
													{{ $additionalService['additional_service_name'] }} - {{ $additionalService['additional_service_price'] }}
												</p>
											</div>

											@endforeach
											@endif
											</p>
										</div>
									</td>
									<td>{{ $item->qty }}</td>
									<td>{{ $item->model->price}}</td>
									<td>
										<button wire:click.prevent='removeDromCart("{{ $item->rowId }}")'><i
												class="fas fa-trash text-danger"></i></button>
									</td>
								</tr>




								@endforeach
								@endif
							</tbody>



						</table>
					</div>
					<div class="flex {{ Session::has('coupon') ? 'justify-end' : 'justify-between' }}">

						<tr>
							@if(!Session::has('coupon'))
							<div class="booking-coupon">
								<div class="form-group">
									<div class="coupon-icon">
										<input type="text" class="form-control border-2 rounded-lg border-light"
											placeholder="Coupon Code" name="couponCode" wire:model='couponCode'>
										<span><img src="{{ asset('assets/imgs/coupon-icon.svg') }}" alt=""></span>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-primary apply-btn"
										wire:click.prevent='applyCouponCode'>Apply</button>
								</div>
							</div>
							@endif
						</tr>

						<tr>
							@if(Session::has('coupon'))
							<td colspan="5" class="flex justify-end">
								<table>
									<tr>
										<td class="text-[15px] font-bold">Discount</td>
										<td class="text-[15px] font-bold">({{Session::get('coupon')['code']}}) <a
												href="#" wire:click.prevent="removeCoupon"><i
													class="fa fa-times text-danger fa-2x"></i></a> </span><b
												class="index"> -Rs.{{number_format($discount,2)}}</b></td>
									</tr>
									<tr>
										<td class="text-[15px] font-bold">SubTotal with Discount</td>
										<td class="text-[15px] font-bold">{{number_format($subtotalAfterDiscount,2)}}
										</td>
									</tr>
									<tr>
										<td class="text-[15px] font-bold">Tax after Discount ({{config('cart.tax')}}%)
										</td>
										<td class="text-[15px] font-bold">{{number_format($taxAfetrDiscount,2)}}</td>
									</tr>
									<tr>
										<td class="text-[15px] font-bold">GrandTotal</td>
										<td class="text-[15px] font-bold">{{number_format($totalAfterDiscount,2)}}</td>
									</tr>
								</table>
							</td>
							@else
							<td colspan="5" class="flex justify-end">
								<table>
									<tr>
										<td class="text-[15px] font-bold">Subtotal</td>
										<td class="text-[15px] font-bold">{{ Cart::subtotal() }}</td>
									</tr>
									<tr>
										<td class="text-[15px] font-bold">Tax</td>
										<td class="text-[15px] font-bold">{{ Cart::tax() }}</td>
									</tr>
									<tr>
										<td class="text-[15px] font-bold">GrandTotal</td>
										<td class="text-[15px] font-bold">{{ Cart::total() }}</td>
									</tr>
								</table>
							</td>
							@endif
						</tr>


					</div>
					<div class="flex justify-end">
						<a href="{{ route('checkout') }}"
							class="btn bg-teal-500 text-light font-extrabold text-[15px] hover:bg-yellow-500 hover:text-indigo-400">Proceed
							To Booking</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>