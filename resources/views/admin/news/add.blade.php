<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add News</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'News','key'=>'Add'])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-body">

                        <form class="" action="{{route('news.store')}}" method='post' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Titles</label>
                                <input type="text"
                                       class="form-control @error('titles') is-invalid @enderror"
                                       placeholder="Enter Titles"
                                       name="titles" value="{{old('titles')}}"/>
                                    @error('titles')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>News image</label>
                                <input type="file"
                                       class="form-control-file @error('feature_image_path') is-invalid @enderror"
                                       name="feature_image_path"/>
                                @error('feature_image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product detail images</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path[]"/>
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >News content</label>
                                <textarea
                                    class="form-control @error('contents') is-invalid @enderror"
                                    rows="3" name="contents" id="contents">{{old('contents')}}</textarea>
                            </div>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection



