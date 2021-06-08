
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

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe1.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe2.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe3.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe4.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Online Help</a></li>
                                <li><a href="">Contact Us</a></li>
                                <li><a href="">Order Status</a></li>
                                <li><a href="">Change Location</a></li>
                                <li><a href="">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">T-Shirt</a></li>
                                <li><a href="">Mens</a></li>
                                <li><a href="">Womens</a></li>
                                <li><a href="">Gift Cards</a></li>
                                <li><a href="">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Privecy Policy</a></li>
                                <li><a href="">Refund Policy</a></li>
                                <li><a href="">Billing System</a></li>
                                <li><a href="">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Company Information</a></li>
                                <li><a href="">Careers</a></li>
                                <li><a href="">Store Location</a></li>
                                <li><a href="">Affillate Program</a></li>
                                <li><a href="">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->

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
                        alert('Update successful');
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
                        alert('Delete successful');
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
