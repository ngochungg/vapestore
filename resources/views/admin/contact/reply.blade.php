<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Home Admin</title>
@endsection
@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Contact','key'=>'Reply'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('contact.send', ['id' => $cont->id]) }}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter config key"
                                       readonly
                                       value="{{$cont->name}}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter config key"
                                       readonly
                                       value="{{$cont->phone}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter config key"
                                       name="email"
                                       readonly
                                       value="{{$cont->email}}">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter config key"
                                       readonly
                                       value="{{$cont->message}}">
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea
                                       class="form-control"
                                       placeholder="Enter Reply"
                                       rows="5" name="reply">{{$cont->reply}}</textarea>
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


