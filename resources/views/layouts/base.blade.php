<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Truelysell | Template</title>
 
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/imgs/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}">

    <!-- Fearther CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css')}}">

    <!-- select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <!-- Aos CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @laravelPWA
    @livewireStyles
    @stack('styles')
</head>

<body>
    <div class="main-wrapper">
       <x-top-bar />
        <!-- Header -->
        @php
        $pages = DB::table('pages')->where('status',1)->get();
        @endphp
        <x-navigation-menu :pages="$pages" />
        <!-- /Header -->

       {{ $slot }}

        <!-- Footer -->
        <x-footer />
        <!-- /Footer -->

        <!-- Cursor -->
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>
        <!-- /Cursor -->

        <!-- Delete Account -->
        <div class="modal fade custom-modal" id="del-account">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 justify-content-between">
                        <h5 class="modal-title">Delete Account</h5>
                        <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                class="feather-x"></i></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="write-review">
                            <form action="login.html">
                                <p>Are you sureyou want to delete This Account? To delete your account, Type your
                                    password.</p>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input"
                                            placeholder="*************">
                                        <span class="toggle-password feather-eye"></span>
                                    </div>
                                </div>
                                <div class="modal-submit text-end">
                                    <a href="#" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Account -->

    </div>


    <!-- scrollToTop start -->
    <div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
            </path>
        </svg>
    </div>
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js')}}"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Fearther JS -->
    <script src="{{ asset('assets/js/feather.min.js')}}"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- Fancybox JS -->
	<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <!-- select JS -->
    <script src="{{ asset('assets/js/select2.min.js')}}"></script>
        <!-- Datetimepicker JS -->
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- Aos -->
    <script src="{{ asset('assets/js/aos.js')}}"></script>

    <!-- Top JS -->
    <script src="{{ asset('assets/js/backToTop.js')}}"></script>

   
	<!-- Sticky Sidebar JS -->
	<script src="{{ asset('assets/js/ResizeSensor.js') }}"></script>
	<script src="{{ asset('assets/js/theia-sticky-sidebar.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <script src="https://kit.fontawesome.com/d217bb84e0.js" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        // Initialize the service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/serviceworker.js', {
                scope: '.'
            }).then(function (registration) {
                // Registration was successful
                console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
            }, function (err) {
                // registration failed :(
                console.log('Laravel PWA: ServiceWorker registration failed: ', err);
            });
        }
    </script>
      
    @stack('modals')
    @livewireScripts
    @stack('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <x-livewire-alert::scripts />

</body>

</html>