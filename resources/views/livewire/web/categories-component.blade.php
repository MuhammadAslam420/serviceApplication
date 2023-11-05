<div>
    
    <div class="bg-img">
        <img src="assets/imgs/work-bg-03.png" alt="img" class="bgimg1">
        <img src="assets/imgs/work-bg-03.png" alt="img" class="bgimg2">
    </div>
    
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Categories</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </nav>
                    <div class="col-md-12 flex justify-center mt-2">
						<input type="search" name="search" id="search" class="form-control w-100 border-light rounded-lg focus:outline-none focus:ring-0 hover:outline-none" placeholder="search category by name here..." wire:model.live='search'>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->	
    
    <div class="content">
        <div class="container">
            <div class="row">
                
                <!-- Category List -->
                @forelse ($categories as $category)
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="{{ route('category',['slug'=>$category->slug]) }}">
                                <img src="{{ asset('assets/imgs') }}/{{ $category->overlay }}" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="{{ asset('assets/imgs') }}/{{ $category->logo }}" alt="">
                                </span>	 
                                <h6><a href="{{ route('category',['slug'=>$category->slug]) }}">{{ $category->name }}</a></h6>
                            </div>		
                            <p>{{ $category->subcategories->count() }} SubCategories</p>
                        </div>							
                    </div>							
                </div> 
                @empty
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-06.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-01.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Computer</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-09.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-02.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Cleaning</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-01.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-03.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Electrical</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-10.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-04.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Construction</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-15.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-05.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Interior</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-08.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-06.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Car Wash</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-11.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-07.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Plumbing</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-03.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-08.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Carpentry</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="category-card flex-fill">
                        <div class="category-img">
                            <a href="search.html">
                                <img src="assets/imgs/service-16.jpg" class="img-fluid" alt="">
                            </a>
                        </div>	
                        <div class="category-info">
                            <div class="category-name">
                                <span class="category-icon">
                                    <img src="assets/imgs/category-09.svg" alt="">
                                </span>	 
                                <h6><a href="search.html">Appliance</a></h6>
                            </div>		
                            <p>22 Services</p>
                        </div>							
                    </div>							
                </div>
                @endforelse
                <!-- /Category List -->
                
            </div>
            {{ $categories->links() }}
        </div>
    </div>
</div>
