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
                    <h1 style="margin-left: 500px; font-weight: 400">Administrator</h1>
                    <table class="table" style="margin-left: 20px">
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
                                <td style="width: 150px; word-wrap: break-word">{{$admin->name}}</td>
                                <td style="width: 200px; word-wrap: break-word">{{$admin->username}}</td>
                                <td style="width: 400px; word-wrap: break-word">{{$admin->email}}</td>
                                    <td>
                                        <form action="{{route('users.roleUpdate',['id'=>$admin->id])}}" method='post'>
                                            @csrf
                                        <input type="radio"  id="option1" name="role" value="2"
                                            {{ ($admin->role == 2)? "checked" : "" }}>Administrator</label>

                                        <input style="margin-left: 20px" type="radio" id="option2" name="role" value="1"
                                            {{ ($admin->role == 1)? "checked" : "" }} >Customer</label>
                                            <input style="margin-left: 50px" type="submit" value="Save" class="btn btn-success">
                                        </form>
                                    </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <hr>
                        <hr>
                    </table>


                    <h1 style="margin-left: 520px;font-weight: 400">Customer</h1>
                    <table class="table" style="margin-left: 20px">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td style="width: 150px; word-wrap: break-word">{{$user->name}}</td>
                                <td style="width: 200px; word-wrap: break-word">{{$user->username}}</td>
                                <td style="width: 400px; word-wrap: break-word">{{$user->email}}</td>
                                <td>
                                    <form action="{{route('users.roleUpdate',['id'=>$user->id])}}" method='post'>
                                        @csrf
                                        <input type="radio"  id="option1" name="role" value="2"
                                            {{ ($user->role == 2)? "checked" : "" }}>Administrator</label>

                                        <input style="margin-left: 20px" type="radio" id="option2" name="role" value="1"
                                            {{ ($user->role == 1)? "checked" : "" }} >Customer</label>
                                        <input style="margin-left: 50px" type="submit" value="Save" class="btn btn-success">
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
