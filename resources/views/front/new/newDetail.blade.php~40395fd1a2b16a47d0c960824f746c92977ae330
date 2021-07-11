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
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        input[type=email], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        }

        input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        .container2 {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        }
        #more {display: none;}
    </style>
</head>
<body>
@include('front.components.header')
@yield('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <style>
                        h3{
                            text-align: center;
                            color:brown;
                        }
                    </style>
                    <h3>BLOG</h3>
                    <div class="card-header">
                        <div><h3>{{$news->news_title}}</h3></div>
                        <div><sub>{{$news->created_at}}</sub></div>
                        <br>
                    </div>
                    <div class="card-body" style="magin-auto">
                        <div>{!!$news->news_content!!}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    <div class="container container2">
        <h2>Đã bình luận:</h2>
        <br>
        <p>
            @foreach($comment1 as $i)
            <div>
                <i><b>writed by {{$i->email}}</b></i>
            </div>
            <div class="content" style="height:auto; width:100%;border: solid rgb(0 0 0 / 50%) 2px;border-radius: 5px; margin-bottom:20px;font-size:20px;">
                <div style="margin-top:3px; margin-bottom:3px; margin-left:3px;">
                    {{$i->comment}}
                </div>
            </div>
            @endforeach
            <span id="dots"></span>

            <span id="more">
            @foreach($comment2 as $i)
            <div>
                <i><b>writed by {{$i->email}}</b></i>
            </div>
            <div class="content" style="height:auto; width:100%;border: solid rgb(0 0 0 / 50%) 2px;border-radius: 5px; margin-bottom:20px;font-size:20px;">
                <div style="margin-top:3px; margin-bottom:3px;margin-left:3px;">
                    {{$i->comment}}
                </div>
            </div>
            @endforeach
            </span>
        </p>
        <button onclick="myFunction()" id="myBtn">Read more</button>
    </div>
        <h3>Your comment</h3>

    <div class="container container2">
        <form action="{{route('comment',$news->id)}}" method="POST">
            <input type="hidden" name="_token"value="{{csrf_token()}}">
            <input type="hidden" name="id_news"value="{{$news->id}}">
            <label for="fname">Email</label>
            <input type="email" id="fname" name="email" placeholder="Your email.." required>


            <label for="subject">Comment</label>
            <textarea id="subject" name="comment" placeholder="Write something.." required style="height:200px" ></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    </div>
</div>
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
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

@yield('js')
</body>
</html>
