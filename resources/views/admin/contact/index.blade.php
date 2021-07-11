@extends('admin.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('js')
    <script src="{{asset('vendors\sweetAlert2\sweetalert2@11.js')}}"></script>
{{--    <script src="{{asset('admins/product/index/index.js')}}"></script>--}}
    <script src="{{asset('admins/delete.js')}}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('admin.layouts.partials.content_header',['name'=>'Contact','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($contact as $contacts)

                                <tr>
                                    <th scope="row">{{ $contacts->name }}</th>
                                    <td>{{ $contacts->phone}}</td>
                                    <td>{{ $contacts->email}}</td>
                                    <td>{{ $contacts->message}}</td>
                                    <td>@if($contacts->reply == '')
                                            Not contacted yet
                                         @else
                                            Contacted
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{route('contact.edit',['id'=>$contacts->id])}}"
                                           class="btn btn-default"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-url="{{route('contact.delete',['id'=>$contacts->id])}}"
                                           class="btn btn-success action_check">
                                            <i style="" class="fas fa-check"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12 mx-auto">
                        {{ $contact->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
