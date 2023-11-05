<section class="client-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-heading aos" data-aos="fade-up">
                    <h2>What our client says</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur elit</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel testimonial-slider">
                    @forelse ($userreviews  as $review)
                    <div class="client-widget aos" data-aos="fade-up">
                        <div class="client-img">
                            <a href="#">
                                <img class="img-fluid" alt="Image" src="{{ asset('assets/imgs')}}/{{ $review->user->profile_photo_path }}">
                            </a>
                        </div>
                        <div class="client-content">
                            <div class="rating">
                                @for($i = 0; $i<$review->rating; $i++)
                                <i class="fas fa-star filled"></i>
                                @endfor
                            </div>
                            <p>{{$review->comments}} </p>
                            <h5>{{ $review->user->name }}</h5>
                            
                        </div>
                    </div>
                    @empty
                    <div class="client-widget aos" data-aos="fade-up">
                        <div class="client-img">
                            <a href="#">
                                <img class="img-fluid" alt="Image" src="{{ asset('assets/imgs/avatar-01.jpg')}}">
                            </a>
                        </div>
                        <div class="client-content">
                            <div class="rating">
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi </p>
                            <h5>Sophie Moore</h5>
                            <h6>Director</h6>
                        </div>
                    </div>
                    <div class="client-widget aos" data-aos="fade-up">
                        <div class="client-img">
                            <a href="#">
                                <img class="img-fluid" alt="Image" src="{{ asset('assets/imgs/avatar-02.jpg')}}">
                            </a>
                        </div>
                        <div class="client-content">
                            <div class="rating">
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi </p>
                            <h5>Mike Hussy</h5>
                            <h6>Lead</h6>
                        </div>
                    </div>
                    <div class="client-widget aos" data-aos="fade-up">
                        <div class="client-img">
                            <a href="#">
                                <img class="img-fluid" alt="Image" src="{{ asset('assets/imgs/avatar-03.jpg')}}">
                            </a>
                        </div>
                        <div class="client-content">
                            <div class="rating">
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                                <i class="bi bi-star filled"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi </p>
                            <h5>John Doe</h5>
                            <h6>CEO</h6>
                        </div>
                    </div> 
                    @endforelse
                

                </div>
            </div>
        </div>
    </div>
</section>