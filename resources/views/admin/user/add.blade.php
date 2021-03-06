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
                                <label>Name</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Name"
                                       name="name" value="{{old('name')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Username"
                                       name="username" value="{{old('name')}}"/>
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
                                       placeholder="Enter Password"
                                       id="password"
                                       name="password"/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Enter Confirm Password"
                                       name="confirm_password"
                                />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Address"
                                       name="address"
                                       value="{{old('address')}}"
                                />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Phone"
                                       name="phone"
                                       value="{{old('phone')}}"
                                />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-md-4">
                                    <label>Birthday</label>
                                    <input type="date"
                                           class="form-control"
                                           name="birthday"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label>Gender</label>
                                    <select id="inputState" class="form-control" name="gender">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Role</label>
                                    <select id="inputState" class="form-control" name="role">
                                        <option value="1">User</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label>Avatar</label><br>
                                    <img  src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                         class="avatar img-circle img-thumbnail" alt="avatar" id="output"
                                    style="width:300px; display: block; margin-left: auto; margin-right: auto;"><br>
                                <input type="file"
                                       class="form-control-file"
                                       style="margin-left: 350px;"
                                       name="image_path" onchange="loadFile(event)"/>
                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output.src) // free memory
                                        }
                                    };
                                </script>


                            </div>
                            <button type="submit" class="btn btn-primary col-md-12">Submit</button>
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



