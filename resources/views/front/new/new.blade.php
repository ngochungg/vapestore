<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="{{asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/main.css')}}" rel="stylesheet">


    <link href="{{asset('/front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/chosen.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/color-01.css')}}" rel="stylesheet">
    @yield('f_css')
</head>
<body>
@include('front.components.header')
@yield('content')

<div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 single-blog-post">
            @foreach($news as $newBlog)
            <h3><a href="{{route('front2New',['id'=>$newBlog->id])}}">{{$newBlog->news_title}}</a></h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-calendar"> {{$newBlog->created_at}}</i></li>
                </ul>
            </div>
                <img src="{{$newBlog->image_path}}" alt="" width="300px">
                <br>
            <a  class="btn btn-primary" href="{{route('front2New',['id'=>$newBlog->id])}}">Read More</a>
                <hr>
            @endforeach
        </div>
{{--    <div class="col-md-5">--}}
{{--        <img src="{{$newBlog->image_path}}" alt="" class="img-thumbnail" width="250px">--}}
{{--    </div>--}}
{{--    <div class="col-md-7">--}}
{{--            <div><a style="color: #fdb45e" href=""><h3>{{$newBlog->news_title}}</h3></a></div>--}}
{{--            <div><h5>--}}
{{--                    {!! Str::limit($newBlog->news_content, 10, ' ...') !!}--}}
{{--                    {!! Str::limit($newBlog->news_content,370)!!}--}}
{{--                </h5></div>--}}
{{--    </div>--}}
{{--        @endforeach--}}
        <div class="col-md-2"></div>
    </div>

</div>
<div style="margin-left: 250px">{{ $news->links('pagination::bootstrap-4') }}</div>
@include('front.components.footer')

<script src="{{asset('/front/js/jquery.js')}}"></script>
<script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/front/js/price-range.js')}}"></script>
<script src="{{asset('/front/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('/front/js/main.js')}}"></script>

<script src="{{asset('/front/js/functions.js')}}"></script>
<script src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('/front/js/jquery-ui-1.12.4.minb8ff.js')}}"></script>
<script src="{{asset('/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('/front/js/jquery-1.12.4.minb8ff.js')}}"></script>
<script src="{{asset('/front/js/chosen.jquery.min.js')}}"></script>


@yield('js')
</body>
</html>
