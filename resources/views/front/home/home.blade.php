@extends('front.layouts.master')

@section('title')
    <title>Home | VapeStore</title>
@endsection

@section('f_css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection

@section('content')
    <!--/slider-->
    @include('front.components.slider')
    <!--/slider-->
    <section>
        <div class="container">
            <div class="row">
                    @include('front.components.sidebar')
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $product)
                            <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                                        <h2>$ {{ $product->price }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$ {{ $product->price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#"
                                               data-url="{{ route('addToCart', ['id'=> $product->id]) }}"
                                               class="btn btn-primary add_to_cart">
                                                Add to cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i>See details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div><!--features_items-->

                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/front/images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/front/images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/front/images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>

{{--    <section id="form"><!--form-->--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-4 col-sm-offset-1">--}}
{{--                    <div class="login-form"><!--login form-->--}}
{{--                        <h2>Login to your account</h2>--}}
{{--                        <form action="#">--}}
{{--                            <input type="text" placeholder="Name" />--}}
{{--                            <input type="email" placeholder="Email Address" />--}}
{{--                            <span>--}}
{{--								<input type="checkbox" class="checkbox">--}}
{{--								Keep me signed in--}}
{{--							</span>--}}
{{--                            <button type="submit" class="btn btn-default">Login</button>--}}
{{--                        </form>--}}
{{--                    </div><!--/login form-->--}}
{{--                </div>--}}
{{--                <div class="col-sm-1">--}}
{{--                    <h2 class="or">OR</h2>--}}
{{--                </div>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <div class="signup-form"><!--sign up form-->--}}
{{--                        <h2>New User Signup!</h2>--}}
{{--                        <form action="#">--}}
{{--                            <input type="text" placeholder="Name"/>--}}
{{--                            <input type="email" placeholder="Email Address"/>--}}
{{--                            <input type="password" placeholder="Password"/>--}}
{{--                            <button type="submit" class="btn btn-default">Signup</button>--}}
{{--                        </form>--}}
{{--                    </div><!--/sign up form-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section><!--/form-->--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        function addToCart(event) {
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data) {
                    if(data.code === 200) {
                        alert('Add to cart success')
                    }
                },
                error: function() {

                },
            });
        }
        $(function() {

            $('.add_to_cart').on('click', addToCart);

        })
    </script>

@endsection
