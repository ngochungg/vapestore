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
        @include('admin.layouts.partials.content_header',['name'=>'Product','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Payment ID</th>
                                <th scope="col">Order Total</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all_order as $order)

                                <tr>
                                    <th scope="row">{{ $order->order_id }}</th>
                                    <td>{{ $order->customer_id }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>$ {{ $order->order_total }}</td>
                                    <td>{{ $order->order_status }}</td>
{{--                                    <td>--}}
{{--                                        <a href="{{route('product.details',['id'=>$order->id])}}"--}}
{{--                                           class="btn btn-default"><i class="fas fa-eye"></i></a>--}}

{{--                                        <a href="{{route('product.edit',['id'=>$order->id])}}"--}}
{{--                                           class="btn btn-default"><i class="fas fa-edit"></i></a>--}}

{{--                                        <a href=""--}}
{{--                                           data-url="{{route('product.delete',['id'=>$order->id])}}"--}}
{{--                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
{{--                    <div class="col-md12 mx-auto">--}}
{{--                        {{ $orders->links('pagination::bootstrap-4') }}--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>

    </div>

@endsection
