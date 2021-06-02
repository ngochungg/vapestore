<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Details Product</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/details/details.css')}}"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Product','key'=>'Details'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-body">
                        <form class="" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Product name</label>
                                <div>{{$product->name}}</div>
                            </div>
                            <div class="form-group">
                                <label>Product price</label>
                                <div>{{number_format($product->price)}}</div>
                            </div>
                            <div class="form-group">
                                <label>Product image</label>
                                <div class="col-md-12">
                                    <div class=" row">
                                        <img class="product_image container_image" src="{{$product->feature_image_path}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product detail images</label>
                                <div class="col-md-12 ">
                                    <div class=" row">
                                        @foreach($product->productImages as $productImageItem)
                                        <div class="col-md-4 container_image">
                                            <img class="product_image" src="{{$productImageItem->image_path}}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Choose category</label>
                                <div>{{optional($product->category)->name}}</div>
                            </div>
                            <div class="form-group">
                                <label>Product tags</label>
                                <select name="tags[]" class="form-control" multiple="multiple">
                                    @foreach($product->tags as $tagItem)
                                    <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Product content</label>
                                <div>{{$product->content}}</div>
                            </div>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{asset('admins/product/details/details.js')}}"></script>
@endsection



