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
                    @include('front.components.sidebar_home')
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">New Products</h2>
                        @foreach($products as $product)
                            <div class="col-sm-4">
                            <div class="product-image-wrapper" >
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" style="height: 250px">
                                            <p style="font-size: 18px; font-weight:300;line-height: 20px; margin-top: 10px;margin-bottom: 0px;height: 40px">{{ $product->name }}</p>
                                        <p style="color: orange; font-size: 16px">$ {{ $product->price }}</p>
                                        <a href="#" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$ {{ $product->price }}</h2>
                                            <a href="{{route('seeDetails',['id'=> $product->id])}}"><p class="overlay-name">{{ $product->name }}</p></a>

                                            <a href="#"
                                               data-pid="{{ $product->id }}"
                                               class="btn btn-primary add-to-cart">
                                                Add to cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->



                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function addToCart(event) {
            event.preventDefault();
            //alert($('#cart-quantity').val());
            // let urlCart = $(this).data('url');
            let pid = $(this).data('pid');

            $.ajax({
                type: "GET",
                url: '{{ route('addToCart') }}',
                dataType: 'json',
                data: { id: pid, quantity: 1},
                success: function(data) {
                    if(data.code === 200) {
                        swal({
                            title: "Add to cart",
                            text: "",
                            icon: "success",
                            button: "Continue",
                        });
                    }
                },
                error: function() {

                },
            });
        }
        $(function() {

            $('.add-to-cart').on('click', addToCart);

        })
    </script>

@endsection
