<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Edit Slider</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/edit/edit.css')}}">
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}"/>
@section('js')

    <script src="{{asset('admins/delete.js')}}"></script>
@endsection
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Slider','key'=>'Edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.update',['id'=>$slider->id])}}" method='post' enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name Slider</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter Name Slider"
                                       name="name" value="{{$slider->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description" rows="4">{{$slider->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file"
                                       class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path">
                                <div class="col-md-5">
                                    <img src="{{$slider->image_path}}" alt="" class="container_image" style="width: 250px; height: 200px">
                                </div>
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <br><br>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


