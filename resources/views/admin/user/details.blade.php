<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Profile</title>
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
        @include('admin.layouts.partials.content_header',['name'=>'User','key'=>'Profile'])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img style="width: 300px;" class="profile-user-img img-fluid img-circle" src="{{Auth::user()->image_path}}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                <p class="text-muted text-center">Administrater</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Created At</b> <a class="float-right">{{Auth::user()->created_at}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Update At</b> <a class="float-right">{{Auth::user()->updated_at}}</a>
                                    </li>
                                </ul>
                                <a href="{{route('users.editPass',['id'=>$user->id])}}" class="btn btn-primary btn-block"><b>Change the password</b></a>
                                <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-primary btn-block"><b>Change the email</b></a>
                            </div>
                            <!-- /.card-body -->
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



