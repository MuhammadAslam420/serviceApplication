<section class="feature-section">
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <h2>Featured Categories</h2>
                    <p>What do you need to find?</p>
                </div>
                <div class="col-md-6 text-md-end aos" data-aos="fade-up">
                    <a href="{{ route('categories') }}" class="btn btn-primary btn-view">View All<i
                            class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($categories as $category)
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('category',['slug'=>$category->slug]) }}" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/category')}}/{{ $category->logo }}" alt="img">
                        </span>
                    </div>
                    <h5 class="font-extrabold hover:text-indigo-600" style="text-transform: capitalize;">{{ $category->name }}</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/services/default')}}/{{ $category->overlay }}" alt="img">
                    </div>
                </a>
            </div>  
            @empty
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-01.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Construction</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-02.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-02.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Car Wash</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/feature.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-03.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Electrical</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-01.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-04.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Cleaning</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-09.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-05.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Interior</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-07.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-06.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Carpentry</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-03.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-07.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Computer</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-06.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="service-details.html" class="feature-box aos" data-aos="fade-up">
                    <div class="feature-icon">
                        <span>
                            <img src="{{ asset('assets/imgs/feature-icon-08.svg')}}" alt="img">
                        </span>
                    </div>
                    <h5>Plumbing</h5>
                    <div class="feature-overlay">
                        <img src="{{ asset('assets/imgs/service-11.jpg')}}" alt="img">
                    </div>
                </a>
            </div>
            @endforelse
        </div>
    </div>
</section>