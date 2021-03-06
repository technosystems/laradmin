<!DOCTYPE html>
<html> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    <link rel="stylesheet" href="{{ asset('css/system.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
    @stack('styles')
  </head>

  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu animate__animated animate__fadeIn animate__slower-2s" data-col="">
     <!-- BEGIN: Header-->
    @include('layouts.partials.sidebar')
    @include('layouts.partials.leftmenu')
    <!--Page Content Here -->
     <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                
            </div>
            <div class="content-body">
                @yield('content')
            </div>
          </div>
      </div>

    <!-- REQUIRED JS SCRIPTS -->
     <!-- General JS Scripts -->
    <script src="{{ asset('js/apps.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/clock.js') }}"></script>
    <script src="{{ asset('js/some.js') }}"></script>
    <script src="{{ asset('js/system.js') }}"></script>

    @stack('scripts')

     <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
  </body>

</html>
