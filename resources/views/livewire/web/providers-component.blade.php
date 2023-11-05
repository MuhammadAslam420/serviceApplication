<div>
    <!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="breadcrumb-title mb-0">Providers</h2>
					</div>
					<div class="col-md-12 flex justify-center">
						<input type="search" name="search" id="search" class="form-control w-100 border-light rounded-lg focus:outline-none focus:ring-0" placeholder="search service providers by there name..." wire:model.live='search'>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->	
		
		<!-- Content -->
		<div class="content">
			<div class="container">				
				<div class="row">
					@forelse ($users as $user)
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="{{route('service-provider',['username'=>$user->username])}}">
									<img src="{{ asset('assets/imgs') }}/{{ $user->profile_photo_path }}" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="{{route('service-provider',['username'=>$user->username])}}">{{ $user->username }}</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>{{ $user->name }}</span>
									</div>
									<div class="providerset-prices">
										<h6><span>Available </span>{{ $user->services->count() }} <span> Services</span></h6>
									</div>
								</div>
								
							</div>
						</div>
					</div>	
					@empty
						

					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-11.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">John Smith</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Electrician</span>
									</div>
									<div class="providerset-prices">
										<h6>$20.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(320)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-12.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Michael</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Carpenter</span>
									</div>
									<div class="providerset-prices">
										<h6>$50.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(228)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-13.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Antoinette</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Cleaner</span>
									</div>
									<div class="providerset-prices">
										<h6>$40.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(130)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-14.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Thompson</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Mechanic</span>
									</div>
									<div class="providerset-prices">
										<h6>$70.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(95)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-15.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Gloria</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Cleaner</span>
									</div>
									<div class="providerset-prices">
										<h6>$30.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(320)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-16.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Lawrence</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Engineer</span>
									</div>
									<div class="providerset-prices">
										<h6>$45.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(228)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-17.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Ellen</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Designer</span>
									</div>
									<div class="providerset-prices">
										<h6>$25.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(130)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-18.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Nathaniel</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Plumber</span>
									</div>
									<div class="providerset-prices">
										<h6>$30.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(95)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-19.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Nicholas</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Electrician</span>
									</div>
									<div class="providerset-prices">
										<h6>$20.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(320)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-20.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Stephanie</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Carpenter</span>
									</div>
									<div class="providerset-prices">
										<h6>$40.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(228)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-21.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">Charles</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Serviceman</span>
									</div>
									<div class="providerset-prices">
										<h6>$55.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(130)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="providerset">
							<div class="providerset-img">
								<a href="provider-details.html">
									<img src="assets/imgs/provider-22.jpg" alt="img">
								</a>
							</div>
							<div class="providerset-content">
								<div class="providerset-price">
									<div class="providerset-name">
										<h4><a href="provider-details.html">George</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
										<span>Mechanic</span>
									</div>
									<div class="providerset-prices">
										<h6>$70.00<span>/hr</span></h6>
									</div>
								</div>
								<div class="provider-rating">
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fa-solid fa-star-half-stroke filled"></i><span>(95)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					@endforelse
					<div class="col-md-12">						
						<div class="blog-pagination">
							{{ $users->links() }}
						</div>					
					</div>
				</div>
				
				
			</div>			
		</div>
		<!-- /Content -->
</div>
