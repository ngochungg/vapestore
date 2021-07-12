<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="{{asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/main.css')}}" rel="stylesheet">


    <link href="{{asset('/front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/chosen.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/color-01.css')}}" rel="stylesheet">
    @yield('f_css')
</head>
<body>
@include('front.components.header')
{{--@yield('content')--}}
@include('front.product.contentProduct')
@include('front.components.footer')

<script src="{{asset('/front/js/jquery.js')}}"></script>
<script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/front/js/price-range.js')}}"></script>
<script src="{{asset('/front/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('/front/js/main.js')}}"></script>

<script src="{{asset('/front/js/functions.js')}}"></script>
<script src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('/front/js/jquery-ui-1.12.4.minb8ff.js')}}"></script>
<script src="{{asset('/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('/front/js/jquery-1.12.4.minb8ff.js')}}"></script>
<script src="{{asset('/front/js/chosen.jquery.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelir.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    // setup csrf-token cho post method
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    function addToCart(event) {
        event.preventDefault();
        //alert($('#cart-quantity').val());
        // let urlCart = $(this).data('url');
        let pid = $(this).data('pid');
        let quantity = $('#cart-quantity').val();
        if (quantity === '')
            quantity = 1;
        $.ajax({
            type: "GET",
            url: '{{ route('addToCart') }}',
            dataType: 'json',
            data: { id: pid, quantity: quantity},
            success: function(data) {
                if(data.code === 200) {
                    swal({
                        title: "Add to cart",
                        text: "",
                        icon: "success",
                        button: "Continue",
                    });
                }
            },
            error: function() {

            },
        });
    }
    $(function() {
        console.log("Calling stars()");
        $('.results-content span.stars').stars();
        $(document).on('click', '.cart_update', cartUpdate);
        $('.add-to-cart').on('click', addToCart);
        

    })
    $.fn.stars = function() { 
        return this.each(function() {
            // Get the value
            var val = parseFloat($(this).html()); 
            // Make sure that the value is in 0 - 5 range, multiply to get width
            var size = Math.max(0, (Math.min(5, val))) * 36.5; 
            // Create stars holder
            var $span = $('<span> </span>').width(size); 
            // Replace the numerical value with stars
            $(this).empty().append($span);
        });
    }
</script>


@yield('js')
</body>
</html>
