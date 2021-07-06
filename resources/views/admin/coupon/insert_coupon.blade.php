<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Home Admin</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="col-sm-12">Add Coupon</h2>
                    <?php
                    $message =Session::get('message');
                    if ($message){
                        echo' <span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="col-sm-3"></div>
                    <div class="col-md-6">
                        <form action="{{URL::to('/insert-coupon-code')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name Coupon</label>
                                <input type="text"
                                       class="form-control"
                                       name="coupon_name" required>
                            </div>
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text"
                                       class="form-control"
                                       name="coupon_code" required>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text"
                                       class="form-control"
                                       name="coupon_time" required>
                            </div>
                            <div class="form-group">
                                <label>Condition</label>
                                <select class="form-control" name="coupon_condition">
                                    <option value="0">-----Chose-----</option>
                                    <option value="1">%</option>
                                    <option value="2">$</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Reduced</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Name Coupon"
                                       name="coupon_number" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="add_coupon">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


