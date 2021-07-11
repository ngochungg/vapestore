@extends('admin.layouts.admin')

@section('title')
    <title>Admin</title>
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
        @include('admin.layouts.partials.content_header',['name'=>'Comment','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Content</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comment as $i)
                                <tr>
                                    <th scope="row">{{$i->id}}</th>
                                    <td style="max-width: 200px;word-wrap: break-word">{{$i->email}}</td>
                                    <td style="max-width: 200px;word-wrap: break-word">{{$i->comment}}</td>
                                    <td>
                                        <a href=""
                                           data-url="{{route('new.comment_delete',['id'=>$i->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $comment->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
