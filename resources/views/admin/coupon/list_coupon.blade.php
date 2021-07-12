@extends('admin.layouts.admin')

@section('title')
    <title>Coupon</title>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection

@section('content')

    <div class="content-wrapper">


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('/insert-coupon') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name Coupon</th>
                                <th scope="col">Code</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Reduced</th>

                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($coupon as $key=>$cou)

                                <tr>

                                    <td>{{$cou->coupon_name}}</td>
                                    <td>{{$cou->coupon_code}}</td>
                                    <td>{{$cou->coupon_time}}</td>
                                    <td>
                                        <?php
                                            if ($cou->coupon_condition==1){
                                                ?>
                                                Discount by percentage
                                        <?php
                                            }else{
                                                ?>
                                                Discount by money
                                        <?php
                                             }
                                           ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($cou->coupon_condition==1){
                                        ?>
                                            {{$cou->coupon_number}}%
                                        <?php
                                        }else{
                                        ?>
                                            ${{$cou->coupon_number}}
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to delete this coupon?')"
                                           href="{{url('/delete-coupon',$cou->coupon_id)}}" class="active styling-edit" >
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
{{--                        {{ $categories->links('pagination::bootstrap-4') }}--}}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
