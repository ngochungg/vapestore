<!-- Stored in resources/views/child.blade.php -->

@extends('admin.layouts.admin')

@section('title')
    <title>Home Admin</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.partials.content_header',['name'=>'Reply','key'=>'Question'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                        <div class="card-body">
                        <label>Name</label>
                        <div>{{$comments->name}}</div>
                        <label>Email</label>
                        <div>{{$comments->email}}</div>
                        <label>Question</label>
                        <div>{{$comments->comment}}</div>
                        <form action="{{route('replyComment',['id'=>$comments->id])}}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea
                                    class="form-control"
                                    name="reply" rows="4">{{$comments->reply}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


