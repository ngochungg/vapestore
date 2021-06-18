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
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6" >
                                        <div style="height: 450px">
                                            <img src="{{$product->feature_image_path}}" height="450px">
                                        </div>
                                        <div style="margin-top:10px;height: 200px;" >
                                            @foreach($product->productImages as $productImageItem)
                                                  <div>
                                                       <img class="image-product" src="{{$productImageItem->image_path}}">
                                                  </div>
                                             @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div>
                                            <name> {{$product->name}} </name>
                                        </div>
                                        <div>
                                            ---- <price> ${{number_format($product->price)}}</price>----
                                        </div>

                                        <hr>

                                            <c>On category : </c> {{optional($product->category)->name}}<br>
                                            <c>Exist : </c> {{$product->quantity}} <br><br>
                                        <div>

                                            <c>Product tags : </c>
                                            @foreach($product->tags as $tagItem)
                                                <tags value="{{$tagItem->name}}" >{{$tagItem->name}}</tags>
                                            @endforeach
                                        </div>

                                        <hr style="width: 50%">

                                        <c >Content : </c> {!!$product->content !!}

                                        <c >Desciption : </c>{!!$product->description !!}
                                    </div>
                                </div>
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



