<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container" style="background-color: #EEEDEB">
            <div class="row">
                <div class="col-sm-5">
                    <div class="contactinfo" >
                        <ul class="nav nav-pills">
                            <li style="top: 7px">{{$title->content}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div> <h5  class="fa fa-phone"> HOTLINE: <a style="color:black" href="tel:{{$phone->content}}">{{$phone->content}}</a></h5></div>

                </div>
                <div class="col-sm-5">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a style="color: blue" href="{{$fb->content}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a style="color: red" href="{{$ytb->content}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="mailto:{{$email->content}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle" ><!--header-middle-->
    <div class="header-middle"  ><!--header-middle-->
        <div class="container" >
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2 clearfix center-block " >
                    <div class="logo">
                        <img src="/front/images/imgvape/logo.jpg" alt="" width="100px" />
                    </div>
                </div>

                <div class="col-md-5 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart h3"></i> Cart</a></li>

                            @if(auth()->check() && auth()->user()->role == 1)
                                <li><a href="{{route('profile',['id'=>Auth::user()->id])}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i>LogOut</a></li>

                            @elseif(auth()->check() && auth()->user()->role == 2)
                                <li><a href="{{route('profile',['id'=>Auth::user()->id])}}"><i class="fa fa-user h3"></i>{{Auth::user()->name}}</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-lock h3"></i>LogOut</a></li>

                            @else
                                <li><a href="{{url('/admin')}}"><i class="fa fa-lock"></i>Login</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                @include('front.components.menu')
                <div class="col-sm-3">
                    <div class="search_box pull-right " >
                            <form action="{{ route('searchName') }}" method="GET">
                                <input type="text" name="search" placeholder=" Search" required  class=" form-control search-input" style="float: left">
                                <button type="submit" class="fa fa-search  search-icon"  ></button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    </div>
</header><!--/header-->
