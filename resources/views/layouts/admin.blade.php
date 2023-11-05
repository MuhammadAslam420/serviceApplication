
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Truelysell | Admin Template</title>
   
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/imgs/favicon.png') }}">
    
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-tagsinput.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}">

   
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @laravelPWA
    @livewireStyles
    @stack('styles')
</head>

<body>
    <div class="main-wrapper">
    
        <!-- Header -->
        <x-admin-header />
        <!-- /Header -->
        
        <!-- Sidebar -->
        <x-admin-sidebar />
        <!-- /Sidebar -->
        
        {{ $slot }}
    </div>

    {{-- <div id="overlayer">
        <span class="loader">
        <span class="loader-inner"></span>
        </span>
    </div> --}}

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    
    <!-- Select 2 JS-->
    <script src="{{ asset('assets/js/select2.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/apexcharts.min.js')}}"></script>
   

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    

     <!-- Feather Icon JS -->
     <script src="{{ asset('assets/js/feather.min.js')}}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{ asset('assets/js/admin.js')}}"></script>
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