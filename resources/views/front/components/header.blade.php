<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container" style="background-color: #EEEDEB">
            <div class="row">
                <div class="col-sm-5">
                    <div class="contactinfo" >
                        <ul class="nav nav-pills">
                            <li style="top: 7px">WELCOME TO OUR STORE<WEBSITE></WEBSITE></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div > <h5  class="fa fa-phone"> HOTLINE: <a href="tel:0909678999"><i></i> 0909.678999</a></h5></div>

                </div>
                <div class="col-sm-5">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
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
                <div class="col-md-1"></div>
                <div class="col-md-3 clearfix">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="/front/images/imgvape/logo.jpg" alt="" width="100px" /></a>
                    </div>

                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                            @if(auth()->check() && auth()->user()->role == 1)
                                <li><a href="{{route('profile')}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i>LogOut</a></li>

                            @elseif(auth()->check() && auth()->user()->role == 2)
                                <li><a href="{{url('/home')}}"><i class="fa fa-star"></i>Admin Page</a></li>
                                <li><a href="{{route('profile')}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i>LogOut</a></li>

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
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    </div>
</header><!--/header-->
