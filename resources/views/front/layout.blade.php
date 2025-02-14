<!DOCTYPE html>
<html lang="en">

<head>
    @include('front/widgets.head')
</head>

<body>
    @include('front/widgets.header')


    <!-- Footer End -->
    @yield('content')
    <!-- Footer Bottom Start -->
    @include('front.widgets.footer')
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    @include('front.widgets.js')

</body>

</html>
