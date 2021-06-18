
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
    <div class="cart_wrapper">
        <section id="cart_items">
            <div class="cartD" data-url="{{ route('deleteCart') }}">
                <div class="container">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Payment</li>
                        </ol>
                    </div>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed update_cart_url" data-url="{{ route('updateCart') }}">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            <tr>
                                @foreach($carts as $id => $cartItem)
                                    @csrf
                                    @php
                                        $total += $cartItem['price'] * $cartItem['quantity'];
                                    @endphp
                                    <td class="cart_product">
                                        <a href="">
                                            <img src="{{ $cartItem['image'] }} " alt=""
                                                 style="width: 200px; height: auto; border-bottom: 1px solid #ccc; margin-bottom: 20px; padding-bottom: 20px">
                                        </a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $cartItem['name'] }}</a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p>$ {{ $cartItem['price'] }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="quantity">
                                            <p>{{ $cartItem['quantity'] }}</p>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                        <p>$ {{ $cartItem['price'] * $cartItem['quantity'] }}</p>
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <!--remove cart-->
                                        <a class="cart_quantity_delete cart_deletes" href="" data-id="{{ $id }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <section id="do_action">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="total_area">
                                        <ul>
                                            <li>Total <span>${{ $total }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!--/#do_action-->
                    <form action="{{ URL::to('/order-place') }}" method="POST">
                        @csrf
                        <div class="payment-options">
                            <h2>Select payment</h2>
                            <span>
						        <label><input name="payment_option" value="ATM" type="radio"> Direct Bank Transfer</label>
					        </span>
                            <span>
						        <label><input name="payment_option" value="Cash" type="radio"> Cash</label>
					        </span>
                        </div>
                        <div style="margin-top: -100px">
                            <input type="submit" value="Order" name="send_order_place" class="btn btn-primary btn-sm">
                        </div>
                    </form>

                </div>
            </div>
        </section> <!--/#cart_items-->

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>

        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart= $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {id: id,quantity: quantity},
                success: function(data) {
                    if(data.code == 200) {
                        $('.cart_wrapper').html(data.cart_component);
                        alert('Update successful');
                    }
                },
                error: function() {

                }
            });
        }

        function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.cartD').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {id: id},
                success: function(data) {
                    if(data.code == 200) {
                        $('.cart_wrapper').html(data.cart_component);
                        alert('Delete successful');
                    }
                },
                error: function() {

                }
            });
        }

        $(function () {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_deletes', cartDelete);
        })
    </script>
@endsection
