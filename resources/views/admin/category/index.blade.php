@extends('admin.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Category','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Level</th>
                                <th scope="col">Name Category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)

                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{$category->parent_id==0?'Parent':'Child of Parent id '.$category->parent_id}}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                           class="btn btn-info " style="width: 42.38px"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-url="{{route('categories.delete',['id'=>$category->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
