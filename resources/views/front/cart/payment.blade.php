
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
                                        $total += $cartItem['price'] * $cartItem['quantity'] ;
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
                            </tr>
                            @endforeach
                            @if(session()->get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition']==1)
                                        @php
                                            $total_coupon=number_format(($total *$cou['coupon_number'])/100);
                                        @endphp

                                    @else
                                        @php
                                            $total_coupon=number_format($cou['coupon_number']);
                                        @endphp
                                    @endif
                                    <?php
                                        $final= $total-$total_coupon;
                                        ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <section id="do_action">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div>
                                        <form action="{{ URL::to('/order-place') }}" method="POST">
                                            @csrf
                                            <div class="payment-options">
                                                <h3>Select payment</h3>
                                                <select class="form-control" name="payment_option">
                                                    <option name="payment_option" value="Paypal">Paypal</option>
                                                    <option name="payment_option" value="Cash">Cash</option>
                                                </select>
                                                <h3>
                                                    Delivery address: <input type="text" name="delivery_address" required>
                                                </h3>
                                            </div>
                                            <div style="margin-top: -100px;">
                                                <input type="submit" value="Order" name="send_order_place" class="btn add-to-cart" style="background: orange; color: white">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="margin-left: 30px">
                                    <div class="total_area" >
                                        <ul>
{{--                                            @php--}}
{{--                                                if($total_coupon){--}}
{{--                                                       <div style="background-color: green;color: white">Have voucher</div>--}}
{{--                                                        }--}}
{{--                                               endif--}}
{{--                                            @endphp--}}


                                            <li style="height: 45px;font-size: 22px;">Total <span>${{ $final}}</span>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!--/#do_action-->


                </div>
            </div>
        </section> <!--/#cart_items-->

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection
