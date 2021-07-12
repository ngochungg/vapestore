<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Settings Edit</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Information','key'=>'Edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('information.update', ['id' => $infomation->id]) }}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter config key"
                                       readonly
                                       value="{{$infomation->key}}">
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea
                                       class="form-control"
                                       placeholder="Enter config value"
                                       rows="5" name="value">{{$infomation->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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


