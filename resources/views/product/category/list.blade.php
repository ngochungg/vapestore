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

<section>
    <div class="container">
        <div class="row">
            @include('front.components.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Items</h2>

                    @foreach($products  as $product)
                        <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" style="min-height: 250px;" />

                                    <h4 style="font-weight: 300">{{ $product->name }}</h4>
                                    <h3 style="color: orange">$ {{ $product->price }}</h3>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h3><a style="color: white;" href="{{ route('seeDetails', ['id'=> $product->id]) }}">{{ $product->name }}</a></h3>
                                        <h3 style="color: #FFFFFF">$ {{ $product->price }}</h3>

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
                                    <li><a href="{{ route('seeDetails', ['id'=> $product->id]) }}"><i class="fa fa-info-circle" aria-hidden="true"></i>See details</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-md12 mx-auto">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
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
