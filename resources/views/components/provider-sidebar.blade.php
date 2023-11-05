<div class="sidebar bg-yellow-300" id="sidebar">
			
			
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="provider-dashboard.html"><i class="feather-grid"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="provider-services.html"><i class="feather-briefcase"></i> <span>My Services</span></a>
                </li>
                <li>
                    <a href="provider-booking.html"><i class="feather-calendar"></i> <span>Bookings </span></a>
                </li>
                <li>
                    <a href="provider-payout.html"><i class="feather-credit-card"></i> <span>Payout</span></a>
                </li>
                <li>
                    <a href="provider-availability.html"><i class="feather-clock"></i> <span>Availability</span></a>
                </li>
                <li>
                    <a href="provider-holiday.html"><i class="feather-calendar"></i> <span>Holidays & Leave</span></a>
                </li>
                <li>
                    <a href="provider-coupons.html"><i class="feather-bookmark"></i> <span>Coupons</span></a>
                </li>
                <li>
                    <a href="provider-subscription.html"><i class="feather-dollar-sign"></i> <span>Subscription</span></a>
                </li>
                <li>
                    <a href="provider-offers.html"><i class="feather-percent"></i> <span>Offers</span></a>
                </li>
                <li>
                    <a href="provider-reviews.html"><i class="feather-star"></i> <span>Reviews</span></a>
                </li>
                <li>
                    <a href="provider-earnings.html"><i class="feather-dollar-sign"></i> <span>Earnings</span></a>
                </li>
                <li>
                    <a href="provider-chat.html"><i class="feather-message-circle"></i> <span>Chat</span></a>
                </li>						
                <li class="submenu">
                    <a href="provider-settings.html"><i class="feather-settings"></i> <span>Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="provider-appointment-settings.html">Appointment Settings</a>
                        </li>
                        <li>
                            <a href="provider-profile-settings.html">Account Settings</a>
                        </li>
                        <li>
                            <a href="provider-social-profile.html">Social Profiles</a>
                        </li>
                        <li>
                            <a href="provider-security-settings.html">Security Setting</a>
                        </li>
                        <li>
                            <a href="provider-plan.html">Plan & Billings</a>
                        </li>
                        <li>
                            <a href="payment-settings.html">Payment Settings</a>
                        </li>
                        <li>
                            <a href="provider-notifcations.html">Notifications</a>
                        </li>
                        <li>
                            <a href="provider-connected-apps.html">Connected Apps</a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#del-account">Delete Account</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        
                    </form>
                    
                    <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="feather-log-out"></i> <span>Logout</span></a>
                </li>
            </ul>
            <div class="menu-bottom">
                <div class="menu-user">
                    <div class="menu-user-img avatar-online">
                        <img src="assets/img/profiles/avatar-02.jpg" alt="user">
                    </div>
                    <div class="menu-user-info">
                        <h6>John Smith</h6>
                        <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="96fcf9fef8e5fbffe2fed6f1fbf7fffab8f5f9fb">[email&#160;protected]</a></p>
                    </div>
                </div>						
                <a href="#" class="select-set"><i class="feather-settings"></i></a>
                <div class="dropdown-menu user-drop" id="dropboxes">
                    <div class="menu-user">
                        <div class="menu-user-img avatar-online">
                            <img src="assets/img/profiles/avatar-02.jpg" alt="user">
                        </div>
                        <div class="menu-user-info">
                            <h6>John Smith</h6>
                            <p>Active</p>
                        </div>
                    </div>
                    <div class="set-user">
                        <p>Set as Away</p>
                        <div class="status-toggle">
                            <input type="checkbox" id="active-user" class="check">
                            <label for="active-user" class="checktoggle">checkbox</label>
                        </div>
                    </div>
                    <ul class="set-menu">
                        <li>
                            <a href="provider-security-settings.html">
                                <i class="feather-settings me-2"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="provider-profile-settings.html">
                                <i class="feather-user me-2"></i> Your Account
                            </a>
                        </li>
                        <li>								
                            <a href="javascript:void(0)">
                                <i class="feather-check-circle me-2"></i> Identity Verification
                            </a>
                        </li>
                    </ul>
                    <ul class="help-menu">
                        <li>								
                            <a href="#">
                                Help Center
                            </a>
                        </li>
                        <li>																
                            <a href="terms-condition.html">
                                Terms of Condition
                            </a>
                        </li>
                        <li>																
                            <a href="privacy-policy.html">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>