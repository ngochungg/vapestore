@extends('admin.layouts.admin')

@section('title')
    <title>Settings</title>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Information','key'=>' '])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Key</th>
                                <th scope="col">Content</th>
                                <th scope="col">Update at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($infomation as $info)
                                <tr>
                                    <th scope="row">{{$info->key}}</th>
                                    <td>
                                        @if($info->content == '')
                                            No information
                                        @else
                                        {{$info->content}}
                                        @endif
                                    </td>
                                    <td>{{$info->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('information.edit', ['id' => $info->id]) }}"
                                           class="btn btn-info " style="width: 42.38px"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
{{--                        {{ $categories->links('pagination::bootstrap-4') }}--}}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
