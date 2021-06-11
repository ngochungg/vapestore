<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Product','key'=>'Add'])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-body">

                        <form class="" action="{{route('product.store')}}" method='post' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter Name Product"
                                       name="name" value="{{old('name')}}"/>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Product price</label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       placeholder="Enter Price Product"
                                       name="price" value="{{old('price')}}"/>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text"
                                       class="form-control @error('quantity') is-invalid @enderror"
                                       placeholder="Enter Quantity Product"
                                       name="quantity" value="{{old('quantity')}}"/>
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product image</label>
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
                                <label>Choose category</label>
                                <select class="form-control select2-init @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="">Category</option>
                                {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product tags</label>
                                <select name="tags[]" class="form-control tags_select_choose
                                @error('category_id') is-invalid @enderror" multiple="multiple" >
                                </select>
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Product content</label>
                                <textarea
                                    class="form-control @error('contents') is-invalid @enderror"
                                    rows="3" name="contents" id="contents">{{old('contents')}}</textarea>
                            </div>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label >Product Description</label>
                                <textarea
                                    class="form-control"
                                    rows="3" name="description" id="description">{{old('description')}}</textarea>
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



