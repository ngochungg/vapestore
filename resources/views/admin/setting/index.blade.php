@extends('admin.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('a_css')
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/delete.js')}}"></script>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Setting','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right" style="padding-bottom: 10px;padding-right: 50px;">
                            <button
                                type="button" class="btn btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add settings
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('settings.create').'?type=Text'}}">Text</a>
                                <a class="dropdown-item" href="{{route('settings.create').'?type=Textarea'}}">Textarea</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($settings as $setting)

                                <tr>
                                    <th scope="row">{{$setting->id}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a href="{{route('settings.edit',['id'=>$setting->id]).'?type='.$setting->type}}"
                                           class="btn btn-default"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-url="{{route('settings.delete',['id'=>$setting->id])}}"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $settings->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
