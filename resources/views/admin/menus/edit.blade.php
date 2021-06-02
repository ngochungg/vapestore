<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Home Admin</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Menu','key'=>'Edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('menus.update',['id'=>$menuFollowIdEdit->id])}}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label>Name Menu</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter Name Menu"
                                       name="name"
                                        value="{{$menuFollowIdEdit->name}}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Choose a parent menu</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Parent menu</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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


