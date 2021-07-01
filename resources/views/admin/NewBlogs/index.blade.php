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
        @include('admin.layouts.partials.content_header',['name'=>'News','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('new.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">New Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($news as $new)

                                <tr>
                                    <th scope="row">{{$new->id}}</th>
                                    <td style="max-width: 200px;word-wrap: break-word">{{$new->news_title}}</td>
                                    <td>
                                        <img class="product_image" src="{{$new->image_path}}" alt="" style="height: 100px">
                                    </td>
                                    <td>

                                        <a href="{{route('new.edit',['id'=>$new->id])}}"
                                           class="btn btn-info" style="width: 42.38px"><i class="fas fa-edit"></i></a>

                                        <a href=""
                                           data-url="{{route('new.delete',['id'=>$new->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $news->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
