<!DOCTYPE html>
<html lang="en">

<head>
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="app">
    <header class="app-header fixed-top">
        @include('layout.topbar')
        @include('layout.sidebar')
    </header><!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @yield('content')
            </div><!--//container-fluid-->
        </div><!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Developed with <span class="sr-only">love</span><i class="fas fa-heart"
                        style="color: #fb866a;"></i> by <a class="app-link" href="http://github.com/Geekdev01T"
                        target="_blank">Geekdev</a> for the entreprises</small>

            </div>
        </footer><!--//app-footer-->

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{ asset('assets/js/index-charts.js')}}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js')}}"></script>

</body>

</html>
