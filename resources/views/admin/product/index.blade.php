@extends('admin.layouts.admin')

@section('title')
    <title>Add Product</title>
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
        @include('admin.layouts.partials.content_header',['name'=>'Product','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $productItem)

                                <tr>
                                    <td style="max-width: 200px;word-wrap: break-word">{{$productItem->name}}</td>
                                    <td>{{number_format($productItem->price)}}</td>
                                    <td>{{($productItem->quantity)}}</td>
                                    <td>
                                        <img class="product_image" src="{{$productItem->feature_image_path}}" alt="" style="height: 100px">
                                    </td>
                                    <td>{{optional($productItem->category)->name}}</td>
                                    <td>
                                        <a href="{{route('product.details',['id'=>$productItem->id])}}"
                                           class="btn btn-default"><i class="fas fa-eye"></i></a>

                                        <a href="{{route('product.edit',['id'=>$productItem->id])}}"
                                           class="btn btn-info" style="width: 42.38px"><i class="fas fa-edit"></i></a>

                                        <a href=""
                                           data-url="{{route('product.delete',['id'=>$productItem->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
