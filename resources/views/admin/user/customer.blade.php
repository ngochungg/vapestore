@extends('admin.layouts.admin')

@section('title')
    <title>Add Product</title>
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
        @include('admin.layouts.partials.content_header',['name'=>'Customer','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{--                        <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Add</a>--}}
                        <div class="btn-group float-left" style="padding-bottom: 10px;padding-right: 50px;">
                            {{--                                <button--}}
                            {{--                                    type="button" class="btn btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--                                    All--}}
                            {{--                                </button>--}}
                            {{--                                <div class="dropdown-menu">--}}
                            {{--                                    <a class="dropdown-item" href="">Text</a>--}}
                            {{--                                    <a class="dropdown-item" href="">Textarea</a>--}}
                            {{--                                    <div class="dropdown-divider"></div>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>


                                    <td>
                                        @if($user->role == 1)
                                            Customer
                                        @else Administrator
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <a href="{{route('users.detailsUser',['id'=>$user->id])}}"
                                           class="btn btn-default"><i class="fas fa-eye"></i></a>

                                        {{--                                        <a href="{{route('users.edit',['id'=>$user->id])}}"--}}
                                        {{--                                           class="btn btn-default"><i class="fas fa-edit"></i></a>--}}

                                        <a href=""
                                           data-url="{{route('users.delete',['id'=>$user->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
