<section id="cart_items">
    <div class="cartD" data-url="{{ route('deleteCart') }}">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed update_cart_url" data-url="{{ route('updateCart') }}">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">#</td>
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
                            @php
                                $total += $cartItem['price'] * $cartItem['quantity'];
                            @endphp
                            <td scope="row">{{ $id }}</td>
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
                                    <p><input type="number" value="{{ $cartItem['quantity'] }}" min="1" class="quantity"></p>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                <p>$ {{ $cartItem['price'] * $cartItem['quantity'] }}</p>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <!--update cart-->
                                <a class="btn btn_primary cart_update" href="" data-id="{{ $id }}">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                &nbsp;
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
        </div>
    </div>

</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Total <span>${{ $total }}</span></li>
                    </ul>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
