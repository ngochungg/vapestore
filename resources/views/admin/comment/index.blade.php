@extends('admin.layouts.admin')

@section('title')
    <title>Admin</title>
@endsection

@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Comment','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Question</th>
                                <th scope="col">Status</th>
                                <th scope="col">Product</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comments as $comment)

                                <tr>
                                    <td scope="row">{{ $comment->name }}</td>
                                    <td scope="row">{{ $comment->email }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        @if($comment->reply == '')
                                            Question unanswered
                                        @else
                                            Answered: {{$comment->reply}}
                                        @endif
                                    </td>
                                    <td>{{$comment->product->name}}

                                    </td>
                                    <td>
                                        <a href="{{route('reply',['id'=>$comment->id])}}"
                                           class="btn btn-default"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $comments->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
