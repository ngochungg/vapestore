
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
    <div class="cart_wrapper">
        @include('front.components.cart_component');
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>

        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart= $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {id: id,quantity: quantity},
                success: function(data) {
                    if(data.code == 200) {
                        $('.cart_wrapper').html(data.cart_component);
                        swal({
                            title: "Update",
                            text: "",
                            icon: "success",
                            button: "Continue",
                        });
                    }
                },
                error: function() {

                }
            });
        }

        function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.cartD').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {id: id},
                success: function(data) {
                    if(data.code == 200) {
                        $('.cart_wrapper').html(data.cart_component);
                        swal("Delete!", "success");
                    }
                },
                error: function() {

                }
            });
        }

        $(function () {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_deletes', cartDelete);
        })
    </script>
@endsection
