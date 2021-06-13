@extends('admin.layouts.admin')

@section('title')
    <title>Role User</title>
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
        @include('admin.layouts.partials.content_header',['name'=>'Role','key'=>'User'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{--                        <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Add</a>--}}
                    </div>
                    <table class="table">
                        <thead><th colspan="5">Administrator</th></thead>
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Admins as $admin)
                            <tr>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->username}}</td>
                                <td>{{$admin->email}}</td>
                                    <td>
                                        <form action="{{route('users.roleUpdate',['id'=>$admin->id])}}" method='post'>
                                            @csrf
                                        <input type="radio"  id="option1" name="role" value="2"
                                            {{ ($admin->role == 2)? "checked" : "" }}>Administrator</label>

                                        <input style="margin-left: 20px" type="radio" id="option2" name="role" value="1"
                                            {{ ($admin->role == 1)? "checked" : "" }} >Customer</label>
                                            <input style="margin-left: 20px" type="submit" value="Save" class="btn btn-secondary">
                                        </form>
                                    </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <table class="table">
                        <thead><th colspan="5">Customer</th></thead>
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('users.roleUpdate',['id'=>$user->id])}}" method='post'>
                                        @csrf
                                        <input type="radio"  id="option1" name="role" value="2"
                                            {{ ($user->role == 2)? "checked" : "" }}>Administrator</label>

                                        <input style="margin-left: 20px" type="radio" id="option2" name="role" value="1"
                                            {{ ($user->role == 1)? "checked" : "" }} >Customer</label>
                                        <input style="margin-left: 20px" type="submit" value="Save" class="btn btn-secondary">
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
