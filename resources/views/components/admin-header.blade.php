<div class="header">
    <div class="header-left"> 
        <a href="/" class="logo">
            <img src="{{ asset('assets/imgs/logod.svg') }}" alt="Logo" width="30" height="30">
        </a>
        <a href="/" class=" logo-small">
            <img src="{{ asset('assets/imgs/logo-small.svg') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
        <i class="fas fa-align-left"></i>
    </a>
    <div class="header-split">
        <div class="page-headers">
            <div class="search-bar">
                <span><i class="fas fa-search"></i></span>
                <input type="text" placeholder="Search" class="form-control">
            </div>
        </div>
        <ul class="nav user-menu">
            <!-- Notifications -->
            <li class="nav-item">
                <a href="/" class="viewsite" ><i class="fas fa-globe me-2"></i>View Site</a>
            </li>
            <li class="nav-item dropdown has-arrow dropdown-heads flag-nav">
                <a class="nav-link" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                    <img src="{{ asset('assets/imgs/us1.png') }}" alt="Flag" height="20"> 
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/imgs/us.png') }}" class="me-2" alt="Flag" height="16"> English
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/imgs/fr.png') }}" class="me-2" alt="Flag" height="16"> French
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/imgs/es.png') }}" class="me-2" alt="Flag" height="16"> Spanish
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('assets/imgs/de.png') }}" class="me-2" alt="Flag" height="16"> German
                    </a>
                </div>
            </li>
            <li class="nav-item  has-arrow dropdown-heads ">
                <a href="javascript:void(0);" class="toggle-switch">
                    <i class="fas fa-moon"></i>
                </a>
            </li>
            <li class="nav-item dropdown has-arrow dropdown-heads ">
                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="user" src="{{ asset('assets/imgs/provider-01.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Thomas Herzberg have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">15 Sep 2020 10:20 PM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="user" src="{{ asset('assets/imgs/provider-02.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Matthew Garcia have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">13 Sep 2020 03:56 AM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="user" src="{{ asset('assets/imgs/provider-03.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Yolanda Potter have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">12 Sep 2020 09:25 PM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/imgs/provider-04.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Ricardo Flemings have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">11 Sep 2020 06:36 PM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/imgs/provider-05.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Maritza Wasson have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">10 Sep 2020 08:42 AM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/imgs/provider-06.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Marya Ruiz have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">9 Sep 2020 11:01 AM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="admin-notification.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/imgs/provider-07.jpg') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Richard Hughes have been subscribed</span>
                                            </p>
                                            <p class="noti-time">
                                                <span class="notification-time">8 Sep 2020 06:23 AM</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="admin-notification.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item  has-arrow dropdown-heads ">
                <a href="javascript:void(0);" class="win-maximize">
                    <i class="fas fa-maximize" ></i>
                </a>
            </li>
            
            <!-- User Menu -->
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="user-link  nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ asset('assets/imgs') }}/{{ Auth::user()->profile_photo_path }}" width="40" alt="Admin">
                        <span class="animate-circle"></span>
                    </span>
                    <span class="user-content">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-details">{{ Auth::user()->utype }}</span>
                    </span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <div class="profilemenu ">
                        <div class="user-detials">
                            <a href="account.html">
                                <span class="profile-image">
                                    <img src="{{ asset('assets/imgs') }}/{{ Auth::user()->profile_photo_path }}" alt="img" class="profilesidebar">
                                </span>
                                <span class="profile-content">
                                    <span>{{ Auth::user()->name }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="subscription-menu">
                            <ul>
                                <li>
                                    <a href="account-settings.html" ><i class="fas fa-user"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="localization.html"><i class="fas fa-cog"></i> Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="subscription-logout">
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                            </form>
                            <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fas fa-sign-out"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- /User Menu -->
        </ul>
    </div>
    
</div>