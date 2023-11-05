<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="/">
                <img src="{{ asset('assets/imgs/logod.svg') }}" class="img-fluid logo" alt="Logo">
            </a>
            <a href="/">
                <img src="{{ asset('assets/imgs/logo-small.svg') }}" class="img-fluid logo-small" alt="Logo">
            </a>
        </div>
        <div class="siderbar-toggle">
            <label class="switch" id="toggle_btn">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title m-0">
                    <h6>Home</h6>
                </li>
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" ><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-title">
                    <h6>Services</h6>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ request()->is('admin/services*') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> 
                        <span>Services</span>
                        <span class="menu-arrow"><i class="fas fa-chevron-right"></i></span>
                    </a>
                    <ul>
                        <li class="{{ request()->is('admin/services') ? 'active' : '' }}">
                            <a href="{{ route('admin.services') }}">services</a>
                        </li>
                        <li class="{{ request()->is('admin/services/additional') ? 'active' : '' }}">
                            <a href="{{ route('admin.additional_services') }}">Additional Services</a>
                        </li>
                        <li class="{{ request()->is('admin/services/seo') ? 'active' : '' }}">
                            <a href="{{ route('admin.services_seo') }}">Services Seo</a>
                        </li>
                    </ul>
                </li>
              
                <li class="{{ request()->is('admin/categories') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories') }}"><i class="fas fa-file-text"></i> 
                        <span>Categories</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/sub-categories') ? 'active' : '' }}">
                    <a href="{{ route('admin.sub_categories') }}"><i class="fas fa-file-text"></i> 
                        <span>SubCategories</span>
                    </a>
                </li>
                
                <li class="{{ request()->is('admin/reviews') ? 'active' : '' }}">
                    <a href="{{ route('admin.reviews') }}"><i class="fas fa-star"></i> 
                        <span>Reviews & Rating</span>
                    </a>
                </li>
                <li class="menu-title">
                    <h6>Booking</h6>
                </li>
                <li class="{{ request()->is('admin/bookings') ? 'active' : '' }}">
                    <a href="{{ route('admin.bookings') }}"><i class="fa-solid fa-book-open-reader"></i> <span> Bookings</span></a>
                </li>
                <li class="menu-title">
                    <h6>Pages</h6>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fas fa-anchor"></i> 
                        <span>Pages</span>
                        <span class="menu-arrow"><i class="fas fa-chevron-right"></i></span>
                    </a>
                    <ul>
                        <li class="{{ request()->is('admin/pages') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages') }}">Pages</a>
                        </li>
                        <li class="{{ request()->is('admin/pages/about') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.about') }}">About</a>
                        </li>
                        <li class="{{ request()->is('admin/pages/contact-us') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.contact-us') }}">Contact</a>
                        </li>
                        <li class="{{ request()->is('admin/pages/about/questions') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.about.questions') }}">Question</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ request()->is('admin/home*') ? 'active' : '' }}"><i class="fas fa-home"></i> 
                        <span>HomePage Setting</span>
                        <span class="menu-arrow"><i class="fas fa-chevron-right"></i></span>
                    </a>
                    <ul>
                        <li class="{{ request()->is('admin/home/banners') ? 'active' : '' }}">
                            <a href="{{ route('admin.home_banners') }}">Banners</a>
                        </li>
                        <li class="{{ request()->is('admin/home/offer') ? 'active' : '' }}">
                            <a href="{{ route('admin.home_offer') }}">Offer Section</a>
                        </li>
                        <li class="{{ request()->is('admin/pages/contact-us') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.contact-us') }}">Contact</a>
                        </li>
                        <li class="{{ request()->is('admin/pages/about/questions') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.about.questions') }}">Question</a>
                        </li>
                    </ul>
                </li>
              
                <li class="submenu {{ request()->is('admin/blogs*') ? 'active' : '' }}" >
                    <a href="javascript:void(0);"><i class="fas fa-blog"></i> 
                        <span>Blog</span>
                        <span class="menu-arrow"><i class="fas fa-chevron-right"></i></span>
                    </a>
                    <ul>
                        <li class='{{ request()->is('admin/blogs/all') ? 'active' : '' }}'>
                            <a href="{{ route('admin.blogs') }}">All Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.add_blog') }}">Add Blog</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <h6>Membership</h6>
                </li>
                <li>
                    <a href="membership.html"><i class="fas fa-user"></i> <span>Membership</span></a>
                </li>
                <li>
                    <a href="membership-addons.html"><i class="fas fa-user-plus"></i> <span>Membership Addons</span></a>
                </li>
                <li class="menu-title">
                    <h6>Reports</h6>
                </li>
                <li>
                    <a href="admin-earnings.html"><i class="fas fa-user"></i> 
                        <span>Admin Earnings</span>
                    </a>
                </li>
                <li>
                    <a href="provider-earnings.html"><i class="fas fa-dollar-sign"></i> 
                        <span>Provider Earnings</span>
                    </a>
                </li>
                <li>
                    <a href="provider-wallet.html"><i class="fas fa-credit-card"></i> 
                        <span>Provider Wallet</span>
                    </a>
                </li>
                <li>
                    <a href="customer-wallet.html"><i class="fas fa-user"></i> 
                        <span>Customer Wallet</span>
                    </a>
                </li>
                <li>
                    <a href="membership-transaction.html"><i class="fas fa-tv"></i> 
                        <span>Membership Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="refund-report.html"><i class="fas fa-file-text"></i> 
                        <span>Refund Report</span>
                    </a>
                </li>
                <li>
                    <a href="register-report.html"><i class="fas fa-git-pull-request"></i> 
                        <span>Register Report</span>
                    </a>
                </li>
                <li>
                    <a href="service-sales.html"><i class="fas fa-bar-chart"></i> 
                        <span>Sales Report</span>
                    </a>
                </li>
                <li class="menu-title">
                    <h6>User Management</h6>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fas fa-user"></i> 
                        <span> Users</span>
                        <span class="menu-arrow"><i class="fas fa-chevron-right"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="user-list.html">New User</a>
                        </li>
                        <li class="{{ request()->is('admin/customers') ? 'active' : '' }}">
                            <a href="{{ route('admin.customers') }}">Customers</a>
                        </li>
                        <li class="{{ request()->is('admin/providers') ? 'active' : '' }}">
                            <a href="{{ route('admin.providers') }}">Providers </a>
                        </li> 
                    </ul>
                </li>
                <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles_permission') }}"><i class="fas fa-user-cog"></i> <span>Roles & Permissions</span></a>
                </li>
                <li>
                    <a href="delete-account-requests.html"><i class="fas fa-trash-2"></i> <span>Delete Account Requests</span></a>
                </li>
                <li>
                    <a href="verification-request.html" ><i class="fas fa-dollar-sign"></i><span>Verification Requests</span></a>
                </li>
                <li class="menu-title">
                    <h6>Marketing</h6>
                </li>
                <li>
                    <a href="marketing-coupons.html"><i class="fas fa-bookmark"></i> <span>Coupons</span></a>
                </li>
                <li>
                    <a href="marketing-service.html"><i class="fas fa-briefcase"></i> <span>Service Offers</span></a>
                </li>
                <li>
                    <a href="marketing-featured.html"><i class="fas fa-briefcase"></i> <span>Featured Services</span></a>
                </li>
                <li>
                    <a href="marketing-newsletter.html"><i class="fas fa-mail"></i> <span>Email Newsletter</span></a>
                </li>
                <li class="menu-title">
                    <h6>Management</h6>
                </li>
                <li>
                    <a href="email-templates.html"><i class="fas fa-mail"></i> <span>Email Templates</span></a>
                </li>
                <li>
                    <a href="sms-templates.html"><i class="fas fa-message-square"></i> <span>SMS Templates</span></a>
                </li>
                <li>
                    <a href="menu-management.html"><i class="fas fa-file-text"></i> <span>Menu Management</span></a>
                </li>
                <li>
                    <a href="website-settings.html"><i class="fas fa-credit-card"></i> <span>Widgets</span></a>
                </li>
                <li>
                    <a href="create-menu.html"><i class="fas fa-list"></i> <span>Create Menu</span></a>
                </li>
                <li>
                    <a href="plugins-manager.html"><i class="fas fa-tv"></i><span>Plugin Managers</span> </a>
                </li>
                <li class="menu-title">
                    <h6>Support & Contact</h6>
                </li>
                <li class="{{ request()->is('admin/chats/all') ? 'active' : '' }}">
                    <a href="{{ route('admin.see_all_chats') }}"><i class="fas fa-comments"></i> <span>Chat</span></a>
                </li>
                <li class="{{ request()->is('admin/with/providers') ? 'active' : '' }}">
                    <a href="{{ route('admin.chat_with_providers') }}"><i class="fa-solid fa-dumpster-fire"></i> <span>Chat With Provider</span></a>
                </li>
                <li class="{{ request()->is('admin/web/contact/messages') ? 'active' : '' }}"> 
                    <a href="{{ route('admin.messages') }}"><i class="fas fa-message"></i> <span>Contact Messages</span></a>
                </li>
                <li class="{{ request()->is('admin/reports/abuse') ? 'active' : '' }}">
                    <a href="{{ route('admin.abuse_reports') }}"><i class="fas fa-user-secret"></i> <span>Abuse Reports</span></a>
                </li>
                <li class="menu-title">
                    <h6>Settings</h6>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-gift" aria-hidden="true"></i> 
                        <span>Sales</span>
                        <span class="menu-arrow"><i class="fas fa-chevron-right"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.sales.coupons')}}">Coupons</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all_packages') }}">Packages</a>
                        </li>
                        <li>
                            <a href="cities.html">Cities</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/web/setting') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}" ><i class="fas fa-cog"></i> <span>Web Settings</span></a>
                </li>
                <li class="{{ request()->is('admin/payments/modules') ? 'active' : '' }}">
                    <a href="{{ route('admin.payments_modules') }}" ><i class="fas fa-credit-card"></i> <span>Payment Methods</span></a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    
                </form>
                
                <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fas fa-sign-out"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>