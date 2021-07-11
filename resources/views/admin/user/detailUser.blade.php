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
                <div class="row wrap-info"  >
                    <div class="col-md-6">
                        <div class="avatarBox"><img class='img-fluid' src="{{Auth::user()->image_path}}" alt="User profile picture" ></div>
                    </div>
                    <div class="col-md-5">
                        <br><br><br>
                        <p class="sayHi">Hello</p>
                        <h1>I'm {{Auth::user()->name}}</h1>
                        <div  class="fa fa-user-md" aria-hidden="true">
                            <i style="font-family: Arial; font-weight: 300"> @if( Auth::user()->role == 2)
                                    Admin VapeStore
                                @else
                                    Customer
                                @endif</i>
                        </div>
                        <hr>
                        <br>
                        <div class='detailInfo'>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Name:</div>
                                <div class='col-lg-8 col-12 b'>{{Auth::user()->name}}</div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Gender:</div>
                                <div class='col-lg-8 col-12 b'>
                                    @if( Auth::user()->gender == 0)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Address:</div>
                                <div class='col-lg-8 col-12 b'>{{Auth::user()->address}}</div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>BirthDay:</div>
                                <div class='col-lg-8 col-12 b'>{{Auth::user()->birthday}}</div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Phone:</div>
                                <div class='col-lg-8 col-12 b'><a href='https://azteam.host/'>{{Auth::user()->phone}}</a></div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Email:</div>
                                <div class='col-lg-8 col-12 b'><a href='mailto:{{Auth::user()->name}}'>{{Auth::user()->email}}</a></div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Create At:</div>
                                <div class='col-lg-8 col-12 b'>{{Auth::user()->created_at}}</div>
                            </div>
                            <div class='row my-2'>
                                <div class='col-lg-4 col-12 boldd'>Update At:</div>
                                <div class='col-lg-8 col-12 b'>{{Auth::user()->updated_at}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 changeinfo-1" ><a href="{{route('users.editPass',['id'=>$user->id])}}" class="btn btn-primary btn-block" ><b>Change the password</b></a></div>
                    <div class="col-sm-6 changeinfo-2" ><a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-primary btn-block"><b>Change the information</b></a></div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/selete2/select2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection



