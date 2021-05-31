<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Product','key'=>'Add'])


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
                                       class="form-control"
                                       placeholder="Enter Name Product"
                                       name="name"/>
                            </div>
                            <div class="form-group">
                                <label>Product price</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Price Product"
                                       name="price"/>
                            </div>
                            <div class="form-group">
                                <label>Product image</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="feature_image_path"/>
                            </div>
                            <div class="form-group">
                                <label>Product detail images</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name="image_path[]"/>
                            </div>
                            <div class="form-group">
                                <label>Choose category</label>
                                <select class="form-control select2-init" name="category_id">
                                    <option value="">Category</option>
                                {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Product content</label>
                                <textarea class="form-control" rows="3" name="contents" id="contents"></textarea>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection



