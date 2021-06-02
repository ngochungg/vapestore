@extends('layouts.admin')

@section('title')
    <title>News</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}"/>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('partials.content_header',['name'=>'News','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('news.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titles</th>
                                <th scope="col">Image</th>
                                <th scope="col">Content</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($news as $newsItem)

                                <tr>
                                    <th scope="row">{{$newsItem->id}}</th>
                                    <td>{{$newsItem->titles}}</td>
                                    <td>
                                        <img class="product_image" src="{{$newsItem->feature_image_path}}" alt="">
                                    </td>
                                    <td>{{ $newsItem->content }}</td>
                                    <td>
                                        <a href="{{route('news.edit',['id'=>$newsItem->id])}}"
                                           class="btn btn-default"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-url="{{route('news.delete',['id'=>$newsItem->id])}}"
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
