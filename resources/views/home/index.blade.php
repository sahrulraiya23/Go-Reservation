<!doctype html>
<html class="no-js" lang="en">

@include('home.css')

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    @include('home.navigasi')

    <!-- top-area Start -->
    <!-- /.top-area-->
    <!-- top-area End -->

    <!--welcome-hero start -->
    @include('home.hero')<!--/.welcome-hero-->
    @include('home.topic')<!--/.welcome-hero-->
    <!--welcome-hero end -->

    <!--list-topics start -->
    <!--/.list-topics-->
    <!--list-topics end-->


    <!--explore start -->
    @include('home.field')<!--/.explore-->
    @include('home.gallery')<!--/.explore-->
    @include('home.contact')<!--/.explore-->
    @include('home.footer')<!--/.explore-->
    <!--explore end -->





    <!--footer end-->

    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="assets/js/bootsnav.js"></script>

    <!--feather.min.js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- counter js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>

    <!--slick.min.js-->
    <script src="assets/js/slick.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="assets/js/custom.js"></script>
    @yield('scripts')

</body>

</html>
