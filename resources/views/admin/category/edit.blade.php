<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Home Admin</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Category','key'=>'Edit'])
    <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name Category</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $category->name }}"
                                       placeholder="Enter Name Category"
                                >
                            </div>
                            <div class="form-group">
                                <label>Choose a parent categorya</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Parent category</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


