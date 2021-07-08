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

                    @if(isset($carts))
                        @foreach($carts as $id => $cartItem)
                            <tr>
                                @csrf
                                @php
                                    $total += $cartItem['price'] * $cartItem['quantity'];
                                @endphp
                                <td class="cart_product">
                                    <a href="">
                                        <img src="{{ $cartItem['image'] }} " alt=""
                                             style="width: 200px; height: 200px;; margin-bottom: 20px; padding-bottom: 20px">
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
                                        <p><input type="number" value="{{ $cartItem['quantity'] }}" min="1"  class="quantity"></p>
                                    </div>
                                    <div class="cart_delete">
                                        <!--update cart-->
                                        <a class="btn btn_primary cart_update" href="" data-id="{{ $id }}">
                                            <i class="fa fa-refresh"></i>
                                        </a>
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
                    @endif



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

                        @if(isset($cartItem))
                            @if(session()->get('coupon'))
                                @foreach(Session::get('coupon') as $key=>$cou)
                                    @if($cou['coupon_condition']==1)
                                        <li>
                                            Reduced: <span>{{$cou['coupon_number']}}%</span>
                                            <p>
                                                @php
                                                    $total_coupon=number_format(($total *$cou['coupon_number'])/100);
                                                echo'<p>Reduced money:'.'<span>$'.$total_coupon.'</span>'.'</p>';
                                                @endphp
                                            </p>
                                            <hr style=" border: solid 1px white; width: 80%">
                                            <p>
                                                Total after discount:  <span>${{number_format($total-$total_coupon)}}</span></p>
                                            <a class="fa fa-trash-o delete_coupon" href="{{url('/drop-coupon')}}" name="drop-coupon" title="Remove coupon" ></a>

                                            </p>
                                        </li>
                                    @else()
                                        <li>
                                            Reduced: <span>${{$cou['coupon_number']}}</span>
                                            <p>
                                                @php
                                                    $total_coupon=$cou['coupon_number'];
                                                @endphp
                                            </p>
                                            <hr style=" border: solid 1px white; width: 80%">
                                            <p>
                                                Total after discount:  <span>${{number_format($total-$total_coupon)}}</span></p>
                                            <a class="fa fa-trash-o delete_coupon" href="{{url('/drop-coupon')}}" name="drop-coupon" title="Remove coupon" ></a>

                                            </p>
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                            <li>
                                <form method="post" action="{{url('/check-coupon')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-9"><input type="text" class="form-control" placeholder="Enter coupon" name="coupon" >
{{--                                                                                @if(session()->get('coupon'))--}}
{{--                                                                                    @foreach(Session::get('coupon') as $key=>$cou)--}}
{{--                                                                                        @if($cou['coupon_code'] )--}}
{{--                                                                                            <div>--}}
{{--                                                                                                <?php--}}
{{--                                                                                                echo ' success'--}}
{{--                                                                                                ?>--}}
{{--                                                                                            </div>--}}

{{--                                                                                            @else--}}
{{--                                                                                            <div>--}}
{{--                                                                                                <?php--}}
{{--                                                                                                echo'wrong'--}}
{{--                                                                                                ?>--}}
{{--                                                                                            </div>--}}

{{--                                                                                        @endif--}}
{{--                                                                                    @endforeach--}}
{{--                                                                                @endif--}}

                                        </div>
                                        <div class="col-sm-2"><input type="submit" value="Check coupon"  class="btn btn-default check_coupon" name="check_coupon" style="margin-left: -10px"></div>
                                    </div>
                                </form>
                            </li>

                        @endif
                    </ul>

                    @php
                        $user = \Illuminate\Support\Facades\Auth::id();
                    @endphp

                    @if(isset($cartItem))
                        @if($user != null)
                            <a class="btn btn-default check_out" href="{{ URL::to('/payment') }}">Check Out</a>

                        @else
                            <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Check Out</a>
                        @endif
                    @else
                        @if(isset($cartItem)==false)
                            @if(session()->get('coupon'))
                                @foreach(Session::forget('coupon') as $key)
                                @endforeach
                            @endif
                        @endif
                    @endif




                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
