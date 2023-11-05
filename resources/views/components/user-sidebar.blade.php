<div class="col-lg-3 theiaStickySidebar">
    <div class="settings-widget">
        <div class="settings-header">
            <div class="settings-img">
                <img src="{{ asset('assets/imgs') }}/{{ Auth::user()->profile_photo_path }}" alt="user">
            </div>
            <h6>{{ Auth::user()->name }}</h6>
            <p>Member Since {{ \Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('MMM YYYY') }}</p>
        </div>
        <div class="settings-menu">
            <ul>
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class="active">
                        <i class="feather-grid"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('my-bookings') ? 'active' : '' }}">
                    <a href="{{ route('my-bookings') }}">
                        <i class="feather-smartphone"></i> <span>Bookings</span>
                    </a>
                </li>
                <li class="{{ Route::is('Favorites') ? 'active' : '' }}">
                    <a href="{{ route('user.wishlist') }}">
                        <i class="feather-heart"></i> <span>Favorites</span>
                    </a>
                </li>
                <li class="{{ Route::is('wallet') ? 'active' : '' }}">
                    <a href="{{ route('user.wallet') }}">
                        <i class="feather-credit-card"></i> <span>Wallet</span>
                    </a>
                </li>
                <li class="{{ Route::is('my_reviews') ? 'active' : '' }}">
                    <a href="{{ route('user.reviews') }}">
                        <i class="feather-star"></i> <span>Reviews</span>
                    </a>
                </li>
                <li class="{{ Route::is('user-chat') ? 'active' : '' }}">
                    <a href="{{ route('user.chat') }}">
                        <i class="feather-message-circle"></i> <span>Chat</span>
                    </a>
                </li>
                <li>
                    <a href="/user/profile">
                        <i class="feather-settings"></i> <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form1">
                        @csrf
                        
                    </form>
                    
                    <a href="#" onclick="document.getElementById('logout-form1').submit();">
                        <i class="feather-log-out"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>