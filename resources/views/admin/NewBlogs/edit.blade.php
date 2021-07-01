<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Admin</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'News','key'=>'Edit'])


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
                        <form class="" action="{{route('new.update',['id'=>$newBlog->id])}}" method='post' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>New title</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Name Product"
                                       name="news_title" value="{{$newBlog->news_title}}"/>
                            </div>


                            <div class="form-group">
                                <label>Image</label><br>
                                <img  src="{{$newBlog->image_path}}"
                                      class="avatar img-circle img-thumbnail" alt="avatar" id="output"
                                      style="width:300px; display: block;"><br>
                                <input type="file"
                                       class="form-control-file"
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

                            <div class="form-group">
                                <label>New content</label>
                                <textarea
                                    class="form-control"
                                    rows="3" name="contents" id="contents">{{$newBlog->news_content}}</textarea>
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



