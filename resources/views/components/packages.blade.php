<section class="service-section pricing-sections pt-0">
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-12 text-center aos" data-aos="fade-up">
                    <h2>Pricing Plans</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
            </div>
        </div>
        <div class="row aos" data-aos="fade-up">
            @forelse ($packages as $package)
            <div class="col-lg-4 col-sm-12">

                <div
                    class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ $package->name }} plan</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-3xl font-semibold">PKR</span>
                        <span class="text-5xl font-extrabold tracking-tight">{{ $package->price }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    {!! $package->description !!}
                    <a href="#"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                        plan</a>
                </div>
            </div>

            @empty
            <div class="col-lg-4 col-sm-12">
                <div class="pricing-popular">
                    <span class="btn w-100">Popular</span>
                </div>
                <div class="pricing-plans">
                    <div class="pricing-planshead">
                        <h4>Basic</h4>
                        <h5>Lorem ipsum dolor sit amet, consectetur</h5>
                        <h6>$50<span>/month</span></h6>
                    </div>
                    <div class="pricing-planscontent">
                        <ul>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Sed perspiciatis unde omnis natus error</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Lorem dolor consecteturadipiscing elit</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Duis irure dolor reprehenderit voluptate</span>
                            </li>
                            <li class="inactive">
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Nemo enim ipsam voluptatem quia </span>
                            </li>
                            <li class="inactive">
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Sed perspiciatis iste natus error </span>
                            </li>
                            <li class="inactive">
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Lorem dolor consecteturadipiscing elit </span>
                            </li>
                        </ul>
                        <div class="pricing-btn">
                            <a href="search.html" class="btn btn-primary btn-view">Get Started<i
                                    class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="pricing-popular active">
                    <span class="btn w-100">Popular</span>
                </div>
                <div class="pricing-plans active">
                    <div class="pricing-planshead">
                        <h4>Standard</h4>
                        <h5>Lorem ipsum dolor sit amet, consectetur</h5>
                        <h6>$100<span>/month</span></h6>
                    </div>
                    <div class="pricing-planscontent">
                        <ul>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Sed perspiciatis unde omnis natus error</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Lorem dolor consecteturadipiscing elit</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Duis irure dolor reprehenderit voluptate</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Nemo enim ipsam voluptatem quia </span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Sed perspiciatis iste natus error </span>
                            </li>
                            <li class="inactive">
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Lorem dolor consecteturadipiscing elit </span>
                            </li>
                        </ul>
                        <div class="pricing-btn">
                            <a href="search.html" class="btn btn-primary btn-view">Get Started<i
                                    class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="pricing-popular ">
                    <span class="btn w-100">Popular</span>
                </div>
                <div class="pricing-plans ">
                    <div class="pricing-planshead">
                        <h4>Premium</h4>
                        <h5>Lorem ipsum dolor sit amet, consectetur</h5>
                        <h6>$150<span>/month</span></h6>
                    </div>
                    <div class="pricing-planscontent">
                        <ul>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Sed perspiciatis unde omnis natus error</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Lorem dolor consecteturadipiscing elit</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Duis irure dolor reprehenderit voluptate</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Nemo enim ipsam voluptatem quia </span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Sed perspiciatis iste natus error </span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle me-2 text-primary"></i>
                                <span>Lorem dolor consecteturadipiscing elit </span>
                            </li>
                        </ul>
                        <div class="pricing-btn">
                            <a href="search.html" class="btn btn-primary btn-view">Get Started<i
                                    class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>