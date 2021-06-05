<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')

    <link href="{{asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/main.css')}}" rel="stylesheet">
    @yield('f_css')
</head>
<body>
    @include('front.components.header')
    @yield('content')
    @include('front.components.footer')
<script src="{{asset('/front/js/jquery.js')}}"></script>
<script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/front/js/price-range.js')}}"></script>
<script src="{{asset('/front/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('/front/js/main.js')}}"></script>
    @yield('js')
</body>
</html>
