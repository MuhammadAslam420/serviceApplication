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
						<h2 class="breadcrumb-title">Contact Us</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		
		<div class="content">
				
			<div class="container">
			
				<!-- Contact Details -->
				<div class="contact-details">
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-4 d-flex">
							<div class="contact-info flex-fill">
								<span><i class="feather-phone"></i></span>
								<div class="contact-data">
									<h4>Phone Number</h4>
									<p>{{ $setting->mobile }}</p>
									<h4>Whatsapp Number</h4>
									<p>{{ $setting->whatsapp }}</p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-4 d-flex">
							<div class="contact-info flex-fill">
								<span><i class="feather-mail"></i></span>
								<div class="contact-data">
									<h4>Email Address</h4>
									<p>{{ $setting->email }}</p>
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-4 d-flex">
							<div class="contact-info flex-fill">
								<span><i class="feather-map-pin"></i></span>
								<div class="contact-data">
									<h4>Address</h4>
									<p>{{ $setting->address }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Contact Details -->
				
				<!-- Get In Touch -->
				<div class="row">
					<div class="col-md-6">
						<div class="contact-img">
							<img src="{{ asset('assets/imgs') }}/{{ $cantact->image }}" class="img-fluid" alt="img">
						</div>
					</div>
					<div class="col-md-6">
						<div class="contact-queries">
							<h2>Get In Touch</h2>
							<form wire:submit.prevent='sendMessage'>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Name</label>
											<input class="form-control" type="text" placeholder="Enter Name*" name='name' wire:model='name'>
											@error('name')
											<span class="text-danger">{{ $message }}</span>
												
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label">Email</label>
											<input class="form-control" type="email" placeholder="Enter Email Address*" name='email' wire:model='email'>
											@error('email')
											<span class="text-danger">{{ $message }}</span>
												
											@enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Phone Number</label>
											<input class="form-control" type="text" placeholder="Enter Phone Number" name='phone' wire:model='phone'>
										</div>
										<div class="form-group">
											<label class="col-form-label">Message</label>
											<textarea class="form-control" rows="4" placeholder="Type Message" name='nmessage' wire:model='message'></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<button class="btn btn-primary" type="submit">Send Message<i class="feather-arrow-right-circle ms-2"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<!-- /Get In Touch -->
				
			</div>
		</div>
		
		<!-- Map -->
		<div class="map-grid">
			<iframe src="{!! $cantact->map !!}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="contact-map"></iframe>
		</div>	
		<!-- /Map -->
</div>
