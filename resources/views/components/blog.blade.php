<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center aos" data-aos="fade-up">
                <div class="section-heading">
                    <h2>Latest Blog</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur elit</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            @forelse ($blogs as $blog)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="blog flex-fill aos" data-aos="fade-up">
                    <div class="blog-image">
                        <a href="{{ route('blog-detail',['id'=>$blog->id]) }}"><img class="img-fluid"
                                src="{{ asset('assets/imgs')}}/{{ $blog->image }}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-item">
                            <li><i class="feather-calendar"></i>{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM Do YYYY') }}</li>
                            <li>
                                <div class="post-author">
                                    <a href="#"><i class="feather-user"></i><span>Admin</span></a>
                                </div>
                            </li>
                        </ul>
                        <h3 class="blog-title">
                            <a href="{{ route('blog-detail',['id'=>$blog->id]) }}">{{ $blog->title }}</a>
                        </h3>
                    </div>
                </div>
            </div> 
            @empty
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="blog flex-fill aos" data-aos="fade-up">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid"
                                src="{{ asset('assets/imgs/blog-01.jpg')}}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-item">
                            <li><i class="feather-calendar"></i>09 Aug 2022</li>
                            <li>
                                <div class="post-author">
                                    <a href="#"><i class="feather-user"></i><span>Hal Lewis</span></a>
                                </div>
                            </li>
                        </ul>
                        <h3 class="blog-title">
                            <a href="blog-details.html">How to Choose a Electrical ServiceProvider?</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="blog flex-fill aos" data-aos="fade-up">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid"
                                src="{{ asset('assets/imgs/blog-02.jpg')}}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-item">
                            <li><i class="feather-calendar"></i>09 Aug 2022</li>
                            <li>
                                <div class="post-author">
                                    <a href="#"><i class="feather-user"></i><span>JohnDoe</span></a>
                                </div>
                            </li>
                        </ul>
                        <h3 class="blog-title">
                            <a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="blog flex-fill aos" data-aos="fade-up">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid"
                                src="{{ asset('assets/imgs/blog-03.jpg')}}" alt="Post Image"></a>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-item">
                            <li><i class="feather-calendar"></i>09 Aug 2022</li>
                            <li>
                                <div class="post-author">
                                    <a href="#"><i class="feather-user"></i><span>Greg Avery</span></a>
                                </div>
                            </li>
                        </ul>
                        <h3 class="blog-title">
                            <a href="blog-details.html">Construction Service Scams: How to Avoid Them</a>
                        </h3>
                    </div>
                </div>
            </div>   
            @endforelse
           
        </div>
    </div>
</section>