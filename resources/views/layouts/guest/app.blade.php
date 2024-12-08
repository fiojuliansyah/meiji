<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/logo/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/fe_assets/css/style.css?version=4.1" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
     @yield('customstyle')
    @livewireStyles
    <title>Meiji Career</title>
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="/fe_assets/imgs/template/loading2.gif" widthalt="JobBox"></div>
            </div>
        </div>
    </div>

    @include('layouts.components.guest.header')
    <main class="main">
        @yield('content')
    </main>


    @extends('layouts.components.guest.footer')



    <!-- <script src="/fe_assets/js/vendor/modernizr-3.6.0.min.js"></script> -->
  <script src="/fe_assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/fe_assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/fe_assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/fe_assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/fe_assets/js/plugins/waypoints.js"></script>
    <script src="/fe_assets/js/plugins/wow.js"></script>
    <script src="/fe_assets/js/plugins/magnific-popup.js"></script>
    <script src="/fe_assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/fe_assets/js/plugins/select2.min.js"></script>
    <script src="/fe_assets/js/plugins/isotope.js"></script>
    <script src="/fe_assets/js/plugins/scrollup.js"></script>
    <script src="/fe_assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/fe_assets/js/plugins/counterup.js"></script>
    <script src="/fe_assets/js/main.js?v=4.1"></script>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('scripts')
    @livewireScripts
</body>

</html>