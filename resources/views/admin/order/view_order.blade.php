@extends('admin.layouts.admin')

@section('title')
    <title>Order list</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}"/>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
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
                                <th scope="col">Order code</th>
                                <th>Customer Name</th>
                                <th>Phone number</th>
                                <th>Delivery address</th>
                                <th>Payment method</th><td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer_info as $customer)
                                @if($customer->order_id == $id)
                                    <tr>
                                        <td>{{ $customer->order_code }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->delivery_address }}</td>
                                        <td>{{ $customer->payment_method }}</td>
                                        <td></td>
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
                                <th scope="col">Rate</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Show</th>
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
                                    <td>{{ $c->rating}}<span class="fa fa-star checked"></span></td>
                                    <td>{{ $c->comment}}</span></td>
                                    @if($c->show_order==0)
                                    <button><td style="vertical-align: middle;"><a href="{{route('show',$c->order_details_id)}}"class="icon" style="cursor: pointer;"><i class="glyphicon glyphicon-ok" style="font-size: 30px;color: black;"></i></a></td></button>
                                    @else
                                    <button><td style="vertical-align: middle;"><a href="{{route('hidden',$c->order_details_id)}}"class="icon" style="cursor: pointer;"><i class="glyphicon glyphicon-ok" style="font-size: 30px;color: #FE980F;"></i></a></td></button>
                                    @endif
                                </tr>
                            @endforeach
                                <tr>
                                    <td style="font-weight: initial; font-size: 20px;"><br>Total order: <br>${{ $total }}</td>
                                    <td>
                                        <form action="{{ route('update',['order_id'=>$id]) }}" method='post'>
                                            @csrf
                                            @foreach($payment as $order)
                                                @if($order->order_status != 'Cancel')
                                                    @if($order->order_status != 'Processed')
                                                    <input type="radio" class="btn btn primary"  id="option1" name="order_status" value="Processing"
                                                        {{ ($order_by_id->payment_method = 'Processing')? "checked" : "" }}>Processing</label>
                                                    <input style="margin-left: 20px" type="radio" id="option2" name="order_status" value="Processed">Processed</label>
                                                    <input style="margin-left: 20px" type="radio" id="option2" name="order_status" value="Cancel">Cancel</label>
                                                    <input style="margin-left: 50px" type="submit" value="Save" class="btn btn-success">
                                                        @endif
                                                    @endif
                                            @endforeach
                                        </form>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
