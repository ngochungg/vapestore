<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('vendors/selete2/select2.min.js')}}"></script>
    <script src="{{asset('admins/confirm.js')}}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'User','key'=>'Add'])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form class="" action="{{route('users.store')}}" method='post' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>User name</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Name User"
                                       name="name" value="{{old('name')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                       class="form-control"
                                       placeholder="Enter Email"
                                       name="email" value="{{old('email')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Enter Price Product"
                                       id="password"
                                       name="password"/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Enter Price Product"
                                       name="confirm_password"
                                />
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image_path"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('vendors/selete2/select2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection



