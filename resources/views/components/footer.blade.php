<footer class="footer">
@php
$setting = DB::table('settings')->first();
@endphp
    <!-- Footer Top -->
    <div class="footer-top aos" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="/"><img src="{{ asset('assets/imgs') }}/{{ $setting->footer_logo }}" alt="logo"></a>
                        </div>
                        <div class="footer-content">
                            <p>Lorem ipsum dolor sit consectetur adipiscing elit, sed do eiusmod tempor commodo
                                consequat. </p>
                        </div>
                        <div class="footer-selects">
                            <h2 class="footer-title">Language & Currency</h2>
                            <div class="row">
                                <div class="col-lg-12 d-flex">
                                    <div class="footer-select">
                                        <img src="{{ asset('assets/imgs/global.svg') }}" alt="img">
                                        <select class="select">
                                            <option>English</option>
                                            <option>France</option>
                                            <option>Spanish</option>
                                        </select>
                                    </div>
                                    <div class="footer-select">
                                        <img src="{{ asset('assets/imgs/dropdown.svg') }}" class="footer-dropdown"
                                            alt="img">
                                        <select class="select">
                                            <option>US Dollars</option>
                                            <option>INR</option>
                                            <option>Kuwait</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Quick Links</h2>
                        <ul>
                            <li>
                                <a href="/about">About Us</a>
                            </li>
                            <li>
                                <a href="/blogs">Blogs</a>
                            </li>
                            <li>
                                <a href="/contact-us">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Become a Professional</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Become a User</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Contact Us</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <p><span><i class="feather-map-pin"></i></span>{{$setting->address}}</p>
                            </div>
                            <p><span><i class="feather-phone"></i></span> {{ $setting->mobile }}</p>
                            <p class="mb-0"><span><i class="feather-mail"></i></span> <a
                                    href="#">{{ $setting->email }}</a>
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget">
                        <h2 class="footer-title">Follow Us</h2>
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="{{ $setting->facebook }}" target="_blank"><i class="fa-brands fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="{{ $setting->instagram }}" target="_blank"><i class="fab fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a href="{{ $setting->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $setting->instagram }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        <livewire:web.news-letter-component />
                    </div>
                    <!-- /Footer Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <!-- Copyright -->
            <div class="copyright">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="copyright-text">
                            <p class="mb-0">Copyright &copy; 2023. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="payment-image">
                            <ul>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/imgs/visa.png') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/imgs/mastercard.png') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/imgs/stripe.png') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/imgs/discover.png') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li>
                                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms') }}">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->
                    </div>
                </div>
            </div>
            <!-- /Copyright -->
        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>