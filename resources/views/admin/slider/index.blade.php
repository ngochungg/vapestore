@extends('admin.layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}"/>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/delete.js')}}"></script>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Slider','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name </th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $slider)

                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td style="max-width: 200px; word-wrap:break-word">{{$slider->name}}</td>
                                    <td style="max-width: 500px; word-wrap:break-word">{{$slider->description}}</td>
                                    <td><img class="product_image" src="{{$slider->image_path}}" alt="" style="width: 150px"></td>
                                    <td>

                                        <a href="{{route('slider.edit',['id'=>$slider->id])}}"
                                           class="btn btn-info" style="width: 42.38px"><i class="fas fa-edit" ></i></a>

                                        <a href=""
                                           data-url="{{route('slider.delete',['id'=>$slider->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md12 mx-auto">
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
