<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Home Admin</title>
@endsection
@section('a_css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Dashboard','key'=>' Admin'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$newOrder}}</h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-cart"></i>
                            </div>
                            <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$product}}</h3>
                                <p>Product</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cube"></i>
                            </div>
                            <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$user}}</h3>
                                <p style="color:white">User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('users.customer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$complete}}</h3>

                                <p>Completed order</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark"></i>
                            </div>
                            <a href="{{route('order.complete')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                               <h3>New Order</h3>

                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order code</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Order Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_order as $key => $order)
                                        <tr>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order-> name }}</td>
                                            <td>$ {{ $order->order_total }}</td>
                                            <td>
                                                <a href="{{route('order.details/{orderId}',['id'=>$order->order_id])}}"
                                                   class="btn btn-default"><i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer"><h5><b>Total estimated revenue<span class="float-right">${{$RevenueNewOrder}}</span></b></h5></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3><b>Revenue</b></h3>
                            </div>
                            <div class="card-body">
                                 <h5>Processing: <span class="float-right"> ${{$processing}}</span></h5>

                                <h5>Processed: <span class="float-right"> ${{$processed}}</span></h5>
                            </div>
                                <div class="card-footer">
                                <h5><b>Total Revenue: <span class="float-right"> ${{$Revenue}}</span></b></h5></div>


                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


