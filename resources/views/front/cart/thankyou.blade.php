
@extends('front.layouts.master')

@section('title')
    <title>Home | VapeStore</title>
@endsection

@section('f_css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection

@section('content')

    <div class=" row" >
        <div class="col-sm-12" style="text-align: center ">
            <h2 style="font-family:Brush Script MT, Brush Script Std, cursive;font-size: 40px;color: red; ">Thank you for your order, we will contact you as soon as we can.  </h2>
            <i class="fa fa-heart" aria-hidden="true" style="color: red; font-size: 40px" ></i><br><br>
        </div>
    </div>

@endsection
