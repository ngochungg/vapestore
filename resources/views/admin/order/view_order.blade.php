@extends('admin.layouts.admin')

@section('title')
    <title>Order list</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}"/>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Order','key'=>'Details'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <h4>Customer Information</h4>
                            <thead>
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th>Phone number</th>
                                <th>Delivery address</th>
                                <th>Payment method</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer_info as $customer)
                                @if($customer->order_id == $id)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->delivery_address }}</td>
                                        <td>{{ $customer->payment_method }}</td>
                                    </tr>
                                    @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <br><br>
                            <h4>Order List</h4>
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i = 0;
                            $total = 0;
                            @endphp
                            @foreach($order_by_id as $c)
                            @php
                                $i++;
                                $total += $c->product_price * $c->product_sales_quantity;
                            @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $c->product_name }}</td>
                                    <td>{{ $c->product_sales_quantity }}</td>
                                    <td>${{ $c->product_price  }}</td>
                                    <td>${{ $c->product_price * $c->product_sales_quantity }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td style="font-weight: initial; font-size: 20px;"><br>Total order: <br>${{ $total }}</td>
                                    <td>
                                        <form action="{{ route('update',['order_id'=>$id]) }}" method='post'>
                                            @csrf
                                            @foreach($payment as $order)
                                                @if($order->order_status != 'Cancel')
                                                    <input type="radio" class="btn btn primary"  id="option1" name="order_status" value="Processing"
                                                        {{ ($order_by_id->payment_method = 'Processing')? "checked" : "" }}>Processing</label>
                                                    <input style="margin-left: 20px" type="radio" id="option2" name="order_status" value="Processed"
                                                        {{ ($order_by_id->payment_method == 'Processed')? "checked" : "" }} >Processed</label>
                                                    <input style="margin-left: 20px" type="radio" id="option2" name="order_status" value="Cancel"
                                                        {{ ($order_by_id->payment_method == 'Cancel')? "checked" : "" }} >Cancel</label>
                                                    <input style="margin-left: 50px" type="submit" value="Save" class="btn btn-success">
                                                    @endif
                                            @endforeach
                                        </form>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
