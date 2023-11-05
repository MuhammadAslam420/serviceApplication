<div>
	<!-- Breadcrumb -->
	<div class="breadcrumb-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-12">
					<h2 class="breadcrumb-title">Our Blog</h2>
					<nav aria-label="breadcrumb" class="page-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item" aria-current="page">Blog</li>
							<li class="breadcrumb-item active" aria-current="page">Grid</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- /Breadcrumb -->

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="row">
						@forelse ($blogs as $blog)
						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="{{ route('blog-detail',['id'=>$blog->id]) }}"><img class="img-fluid"
											src="{{ asset('assets/imgs') }}/{{ $blog->image }}" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Computer</span></li>
											<li><i class="feather-calendar me-2"></i>{{
												\Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM Do YYYY') }}
											</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="{{ asset('assets/imgs/avatar-02.jpg') }}"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="{{ route('blog-detail',['id'=>$blog->id]) }}">{{ $blog->title }}</a>
									</h3>
									<p>{!! strlen($blog->description) > 100 ? substr($blog->description, 0, 100) . '...'
										: $blog->description !!}</p>
									<a href="{{ route('blog-detail',['id'=>$blog->id]) }}" class="read-more">Read More
										<i class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>
						@empty
						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="blog-details.html"><img class="img-fluid" src="assets/imgs/service-19.jpg"
											alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Computer</span></li>
											<li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="assets/imgs/avatar-02.jpg"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="blog-details.html">How to Fix a Computer in Just 3 Steps?</a>
									</h3>
									<p>Sed ut perspiciatis omnis natus error voluptatem architecto beatae vitae dicta
										sunt explicabo.</p>
									<a href="blog-details.html" class="read-more">Read More <i
											class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>

						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="blog-details.html"><img class="img-fluid" src="assets/imgs/service-10.jpg"
											alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Construction</span></li>
											<li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="assets/imgs/avatar-02.jpg"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="blog-details.html">Construction Service Scams: How to Avoid Them</a>
									</h3>
									<p>Sed ut perspiciatis omnis natus error voluptatem architecto beatae vitae dicta
										sunt explicabo.</p>
									<a href="blog-details.html" class="read-more">Read More <i
											class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>

						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="blog-details.html"><img class="img-fluid" src="assets/imgs/service-08.jpg"
											alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Car Wash</span></li>
											<li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="assets/imgs/avatar-02.jpg"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur sed do</a>
									</h3>
									<p>Sed ut perspiciatis omnis natus error voluptatem architecto beatae vitae dicta
										sunt explicabo.</p>
									<a href="blog-details.html" class="read-more">Read More <i
											class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>

						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="blog-details.html"><img class="img-fluid" src="assets/imgs/service-19.jpg"
											alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Electrical</span></li>
											<li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="assets/imgs/avatar-02.jpg"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur sed do</a>
									</h3>
									<p>Sed ut perspiciatis omnis natus error voluptatem architecto beatae vitae dicta
										sunt explicabo.</p>
									<a href="blog-details.html" class="read-more">Read More <i
											class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>

						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="blog-details.html"><img class="img-fluid" src="assets/imgs/service-09.jpg"
											alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Cleaning</span></li>
											<li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="assets/imgs/avatar-02.jpg"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur sed do</a>
									</h3>
									<p>Sed ut perspiciatis omnis natus error voluptatem architecto beatae vitae dicta
										sunt explicabo.</p>
									<a href="blog-details.html" class="read-more">Read More <i
											class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>

						<div class="col-md-4 d-flex">

							<!-- Blog Post -->
							<div class="blog grid-blog flex-fill">
								<div class="blog-image">
									<a href="blog-details.html"><img class="img-fluid" src="assets/imgs/service-07.jpg"
											alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<div class="blog-category">
										<ul>
											<li><span class="cat-blog">Interior</span></li>
											<li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											<li>
												<div class="post-author">
													<a href="#"><img src="assets/imgs/avatar-02.jpg"
															alt="Post Author"><span>Admin</span></a>
												</div>
											</li>
										</ul>
									</div>
									<h3 class="blog-title">
										<a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur sed do</a>
									</h3>
									<p>Sed ut perspiciatis omnis natus error voluptatem architecto beatae vitae dicta
										sunt explicabo.</p>
									<a href="blog-details.html" class="read-more">Read More <i
											class="feather-arrow-right-circle"></i></a>
								</div>
							</div>
							<!-- /Blog Post -->

						</div>


						@endforelse
						<div class="col-md-12">

							<div class="blog-pagination">
								{{$blogs->links()}}
							</div>

						</div>



					</div>

				</div>

			</div>
		</div>



	</div>
</div>