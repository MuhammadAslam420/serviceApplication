<div>
    <!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title">About Us</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">About Us</li>
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
						<div class="col-lg-6">
							<div class="about-img">
								<div class="about-exp">
									<span>{{ $aboutPage->experience }}+ years of experiences</span>
								</div>
								<div class="abt-img">
									<img src="{{ asset('assets/imgs') }}/{{ $aboutPage->image }}" class="img-fluid" alt="img">
								</div>
							</div>
						</div>					
						<div class="col-lg-6">
							<div class="about-content">
								<h6>ABOUT OUR COMPANY</h6>
								<h2>{{ $about->title }}</h2>
								<p>{!! $about->description !!}</p>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<!-- /About -->
		
			<!-- Work Section -->
			<x-work/>
			<!-- /Work Section -->		
		
			<!-- Choose Us Section -->
			<div class="chooseus-sec">				
				<div class="container">				
					<div class="row" >		
						<div class="col-md-6" >
							<div class="choose-content" >
								<h2>Why Choose Us</h2>
								{{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus</p> --}}
								@foreach ($questions as $question)
								<div class="support-card">
									<h4 class="support-title">
										<a >{{ $question->question }}</a>
									</h4>
									
								</div>
								@endforeach	
							</div>
						</div>					
						<div class="col-md-6">
							<div class="chooseus-img">
								<img src="{{ asset('assets/imgs') }}/{{ $aboutPage->image2 }}" class="img-fluid" alt="img">
							</div>
						</div>							
					</div>
					<div class="row">		
						<div class="col-md-3">
							<div class="choose-icon">
								<img src="{{ asset('assets/imgs/choose-icon.svg') }}" class="img-fluid" alt="img">
								<div class="choose-info">
									<h5>{{ $users }}+</h5>
									<p>Satisfied Clients</p>
								</div>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="choose-icon">
								<img src="assets/imgs/choose-icon-01.svg" class="img-fluid" alt="img">
								<div class="choose-info">
									<h5>{{ $bookings }}</h5>
									<p>Total Project</p>
								</div>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="choose-icon">
								<img src="assets/imgs/choose-icon.png" class="img-fluid" alt="img">
								<div class="choose-info">
									<h5>{{ $booking_completed }}</h5>
									<p>Project Completed</p>
								</div>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="choose-icon border-0">
								<img src="assets/imgs/choose-icon-03.svg" class="img-fluid" alt="img">
								<div class="choose-info">
									<h5>{{ $aboutPage->experience }}+</h5>
									<p>Years of experience</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Choose Us Section -->
			
			<!-- Providers Section -->
			<section class="providers-section abt-provider">			
				<div class="container">
					<div class="section-heading">
						<div class="row">
							<div class="col-md-6">					
								<h2>Top Providers</h2>
								<p>Meet Our Experts</p>	
							</div>
							<div class="col-md-6 text-md-end">
								<a href="{{ route('providers') }}" class="btn btn-primary btn-view">View All<i class="feather-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach ($top_providers as $provider)
						<div class="col-lg-3 col-sm-6">
							<div class="providerset">
								<div class="providerset-img">
									<a href="{{ route('service-provider',['username'=>$provider->user->username]) }}">
										<img src="{{ asset('assets/imgs') }}/{{ $provider->user->profile_photo_path }}" alt="img">
									</a>
								</div>
								<div class="providerset-content">
									<div class="providerset-price">
										<div class="providerset-name">
											<h4><a href="{{ route('service-provider',['username'=>$provider->user->username]) }}">{{ $provider->user->name }}</a>
												<i class="fa fa-check-circle" aria-hidden="true"></i></h4>
											<span>{{ $provider->user->username }}</span>
										</div>
										{{-- <div class="providerset-prices">
											<h6>$20.00<span>/hr</span></h6>
										</div> --}}
									</div>
									{{-- <div class="provider-rating">
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fa-solid fa-star-half-stroke filled"></i><span>(320)</span>
										</div>
									</div> --}}
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>
			<!-- /Providers Section -->
			
			<!-- Client Section -->
			<x-reviews :userreviews="$userreviews" />
			<!-- /Client Section -->
			
			<!-- Service Section -->
			<<x-offering :offer="$offer" />
			<!-- /Service Section -->
		</div>
</div>
