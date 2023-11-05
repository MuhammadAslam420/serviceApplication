<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                @php
                $setting = DB::table('settings')->first();
                @endphp
                <a href="/" class="navbar-brand logo">
                    <img src="{{ asset('assets/imgs') }}/{{ $setting->logo }}" class="img-fluid" alt="Logo">
                </a>
                <a href="/" class="navbar-brand logo-small">
                    <img src="{{ asset('assets/imgs/logo-small.png') }}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="/" class="menu-logo">
                        <img src="{{ asset('assets/imgs') }}/{{ $setting->logo }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="bi bi-times"></i></a>
                </div>
                <ul class="main-nav">
                    @foreach($pages as $page)
                     
                    <li class="{{ request()->is($page->route) ? 'active' : '' }}">
                        <a href="{{ $page->route }}" wire:navigate style="text-transform:capitalize;">{{ $page->routeName }}</a>
                    </li>
                    @if($page->name === 'categories')
                    <li class="has-submenu megamenu">
                        <a href="javascript:void(0);">Mega Menu <i class="bi bi-chevron-down"></i></a>
                        <ul class="submenu mega-submenu">
                            @php
                            $categories = DB::table('categories')->where('status','active')->get();
                            @endphp
                            <li>
                                <div class="megamenu-wrapper">
                                    <div class="row">
                                        @forelse ($categories as $category)
                                        <div class="col-lg-2">
                                            <div class="single-demo ">
                                                <div class="demo-img">
                                                    <a href="{{ route('category',['slug'=>$category->slug]) }}"
                                                        wire:navigate><img
                                                            src="{{ asset('assets/imgs/services/default') }}/{{ $category->overlay }}"
                                                            class="img-fluid" alt="img"></a>
                                                </div>
                                                <div class="demo-info">
                                                    <a href="{{ route('category',['slug'=>$category->slug]) }}"
                                                        wire:navigate class="font-extrabold"
                                                        style="text-transform: capitalize;">{{ $category->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-lg-2">
                                            <div class="single-demo ">
                                                <div class="demo-img">
                                                    <a href="#"><img src="{{ asset('assets/imgs/no-record.jpeg') }}"
                                                            class="img-fluid" alt="img"></a>
                                                </div>
                                                <div class="demo-info">
                                                    <a href="#">No Record Find</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforelse

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                    
                    {{-- @elseif($page->name === 'services')
                    <li class="has-submenu megamenu">
                        <a href="javascript:void(0);">Services <i class="bi bi-chevron-down"></i></a>
                        <ul class="submenu mega-submenu">
                            @php
                            $categories = DB::table('categories')->where('status','active')->get();
                            @endphp
                            <li>
                                <div class="megamenu-wrapper">
                                    <div class="row">
                                        @forelse ($categories as $category)
                                        <div class="col-lg-2">
                                            <div class="single-demo ">
                                                <div class="demo-img">
                                                    <a href="{{ route('category',['slug'=>$category->slug]) }}"
                                                        wire:navigate><img
                                                            src="{{ asset('assets/imgs/services/default') }}/{{ $category->overlay }}"
                                                            class="img-fluid" alt="img"></a>
                                                </div>
                                                <div class="demo-info">
                                                    <a href="{{ route('category',['slug'=>$category->slug]) }}"
                                                        wire:navigate class="font-extrabold"
                                                        style="text-transform: capitalize;">{{ $category->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-lg-2">
                                            <div class="single-demo ">
                                                <div class="demo-img">
                                                    <a href="#"><img src="{{ asset('assets/imgs/no-record.jpeg') }}"
                                                            class="img-fluid" alt="img"></a>
                                                </div>
                                                <div class="demo-info">
                                                    <a href="#">No Record Find</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforelse

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @elseif($page->name === 'categories')
                    <li class="{{ request()->is('categories') ? 'active' : '' }}">
                        <a href="/categories" wire:navigate>Categories</a>
                    </li>
                    @elseif($page->name === 'providers')
                    <li class="{{ request()->is('providers') ? 'active' : '' }}">
                        <a href="/providers" wire:navigate>Providers</a>
                    </li>
                    @elseif ($page->name === 'about')
                    <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="/about" wire:navigate>About</a></li>
                    @elseif ($page->name === 'contact-us')
                    <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="/contact-us" wire:navigate>Contact Us</a></li>
                    @elseif ($page->name === 'blog')
                    <li class="{{ request()->is('blogs') ? 'active' : '' }}">
                        <a href="/blogs" wire:navigate>Blog</a>
                    </li>
                    @elseif ($page->name === 'vip')
                    <li class="{{ request()->is('vips') ? 'active' : '' }}">
                        <a href="/vip" wire:navigate>VIP</a>
                    </li>
                    @endif --}}
                    @endforeach
                    <li class="has-submenu">
                        <a href="#">


                            @auth
                            {{ auth()->user()->name }}
                            @else

                            SignIn
                            @endauth

                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            @auth
                            @if(Auth::user()->utype === 'ADM')
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf

                                </form>

                                <a href="#" onclick="document.getElementById('logout-form').submit();">Log Out</a>
                            </li>
                            @elseif(Auth::user()->utype === 'VEN')
                            <li><a href="{{ route('provider.dashboard') }}">Dashboard</a></li>
                            <li><a href="provider-services.html">My Services</a></li>
                            <li><a href="{{ route('create-service') }}">Create Service</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    
                                </form>
                                
                                <a href="#" onclick="document.getElementById('logout-form').submit();">Log Out</a>
                            </li>
                            @else
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('cart') }}">My Cart</a></li>
                            <li><a href="{{ route('my-bookings') }}">My Bookings</a></li>
                            <li><a href="{{ route('user.wishlist') }}">My Favorites</a></li>
                            <li><a href="{{ route('user.wallet') }}">My Wallet</a></li>
                            <li><a href="{{ route('user.reviews') }}">My Reviews</a></li>
                            <li><a href="{{ route('user.chat') }}">Chat</a></li>
                            <li><a href="user/profile">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf

                                </form>

                                <a href="#" onclick="document.getElementById('logout-form').submit();">
                                    <i class="feather-log-out"></i> <span>Logout</span>
                                </a>
                            </li>
                            @endif
                            <!-- Add more links for authenticated users here -->
                            @else
                            <li><a href="{{ route('login') }}">SignIn</a></li>
                            <li><a href="{{ route('sign-up') }}">SignUp</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">

                @auth
                @if(Auth::user()->utype === 'VEN')
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('create-service') }}"><i
                            class="bi bi-badge-ad-fill mr-1"></i>Create Ads</a>
                </li>
                @endif
                @endauth
            </ul>
        </nav>
    </div>
</header>