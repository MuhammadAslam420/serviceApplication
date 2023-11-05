<div class="header">
    <div class="header-left"> 
    <div class="sidebar-logo">
            <a href="index.html">
                <img src="assets/img/logo.svg" class="img-fluid logo" alt="">
            </a>
            <a href="index.html">
                <img src="assets/img/logo-small.png" class="img-fluid logo-small" alt="">
            </a>
        </div>
        <div class="siderbar-toggle">
            <label class="switch" id="toggle_btn">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <a class="mobile_btns" id="mobile_btns" href="javascript:void(0);">
        <i class="fas fa-align-left"></i>
    </a>
    <div class="header-split">
        <div class="page-headers">
            <div class="search-bar">
                <span><i class="feather-search"></i></span>
                <input type="text" placeholder="Search" class="form-control">
            </div>
        </div>
        <ul class="nav user-menu">
            <!-- Notifications -->
            <li class="nav-item">
                <a href="index.html" class="viewsite" ><i class="feather-globe me-2"></i>View Site</a>
            </li>
            <li class="nav-item dropdown has-arrow dropdown-heads flag-nav">
                <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">
                    <img src="assets/img/flags/us1.png" alt="" height="20"> 
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/img/flags/us.png" class="me-2" alt="" height="16"> English
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/img/flags/fr.png" class="me-2" alt="" height="16"> French
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/img/flags/es.png" class="me-2" alt="" height="16"> Spanish
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/img/flags/de.png" class="me-2" alt="" height="16"> German
                    </a>
                </div>
            </li>
            <li class="nav-item  has-arrow dropdown-heads ">
                <a href="#">
                    <i class="feather-moon"></i>
                </a>
            </li>
            <li class="nav-item dropdown has-arrow dropdown-heads ">
                <a href="#" data-bs-toggle="dropdown">
                    <i class="feather-bell"></i>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <div>
                            <span class="notification-title">Notifications</span>
                            <select>
                                <option>All</option>
                                <option>Read</option>
                            </select>
                        </div>
                        <a href="javascript:void(0)" class="clear-noti">Mark all as read <i class="fa-regular fa-circle-check"></i> </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <div class="media d-flex">
                                    <a href="notification.html">
                                        <span class="avatar avatar-sm avatar-online flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                        </span>
                                    </a>
                                    <div class="media-body flex-grow-1">
                                        <a href="notification.html"><p class="noti-details">Lex Murph <span class="noti-title"> requested access to</span> Computer & Server AMC Service </p></a>
                                        <div class="notify-btns">
                                            <button class="btn btn-primary">Accept</button>
                                            <button class="btn btn-secondary">Cancel</button>
                                        </div>
                                        <p class="noti-time"><span class="notification-time">Today 10:04 PM</span></p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification-message">
                                <a href="provider-notifcations.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm avatar-online flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-01.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">Ray Arnold <span class="noti-title">left 6 comments on</span> Commercial Painting Services</p>
                                            <p class="noti-time"><span class="notification-time">Today 9:45 PM</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="provider-notifcations.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm avatar-online flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-03.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">Dennis Nedry <span class="noti-title">commented on</span> Electric Panel Repairing Service </p>
                                            <h6>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et  commodo consequat..”</h6>
                                            <p class="noti-time"><span class="notification-time">Yesterday 8:17 AM</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="provider-notifcations.html">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm avatar-online flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-04.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">John Hammond <span class="noti-title">has booked your</span> House Cleaning Services </p>
                                            <p class="noti-time"><span class="notification-time">Last Wednesday at 11:15 AM</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="provider-notifcations.html">View More <img src="assets/img/icons/circle-icon.svg" alt=""></a>
                    </div>
                </div>
            </li>
            <li class="nav-item  has-arrow dropdown-heads ">
                <a href="#" class="win-maximize">
                    <i class="feather-maximize" ></i>
                </a>
            </li>

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow account-item">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <div class="user-infos">
                        <span class="user-img">
                            <img src="assets/img/profiles/avatar-02.jpg" class="rounded-circle" alt="">
                        </span>
                        <div class="user-info">
                            <h6>John Smith</h6>
                            <p>Demo User</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end emp">
                    <a class="dropdown-item" href="provider-profile-settings.html">
                        <i class="feather-user me-2"></i> Profile
                    </a>
                    <a class="dropdown-item" href="index.html">
                        <i class="feather-log-out me-2"></i> Logout
                    </a>
                </div>
            </li>
            <!-- /User Menu -->
        </ul>
    </div>
    
</div>