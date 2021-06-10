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

    <style>
        h3{
            text-align: center;
            color: gray;
        }
        c{
            color:gray;
            font-size: 18px;
        }
        d{
            font-size: 22px;
            font-family: 'Nunito', sans-serif;
            font-weight: lighter;
        }
    </style>
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-4">
                    <img src="front/images/imgvape/trick2.jpg" alt="" width="320px">
                    <h3>Man</h3>
                </div>
                <div class="col-sm-4">
                    <img src="front/images/imgvape/girltrick.jpg" alt="" width="320px">
                    <h3>Girl</h3>
                </div>
                <div class="col-sm-4">
                    <img src="front/images/imgvape/onggiam.jpg" alt="" width="320px">
                    <h3>Your grandfather</h3>
                </div>
                <h3>Your lover can leave you but Vape NO!...</h3><br>
            </div>

            <h2 class="title text-center" style="font-size: 30px">-->Contact us</h2><br>

            <div class="row">
                <div class="col-md-6">
                    <img src="front/images/imgvape/congdongvape2.jpg" alt="" width="560px" ><br><br>
                    <d >MAKING THE DIFFERENCE</d>
                    <p>According to chairman VanNguyen and lucky guard TheLong, their goal in life is to help people quit smoking forever. Their mission is to reduce economic waste and stop the growing number of tobacco-related deaths, estimated to be in the millions. If I can help one stubborn man quit, I'm confident I can help others quit too. That's what I want to dedicate my life to and that's what I will continue to do in the future. Work towards a smoke-free world.</p>

                </div>

                <div class="col-md-6">
                    <d>ABOUT VAPESTORE</d>
                    <br>
                    <p>At VapeStore, our mission is to create a playground for Vape, Pod, other e-cigarette devices. This place shares experiences of using vape - pods, introduces new products, constantly updates the latest and best quality models. After years of witnessing so many tobacco-related deaths, CEO and founder NgocHung, along with co-founder HoaiBao, are determined to work towards becoming a trusted e-cigarette retailer. The most reliable way to inspire customers to quit smoking easily.</p>

                    <img src="front/images/imgvape/congdongvape1.jpg" alt="" width="560px" style="margin-top: 155px" >
                </div>

                <div class="col-sm-9" style="margin-top: 30px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3253162668498!2d106.66410831436048!3d10.786376992314775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23c80767d%3A0x5a981a5efee9fd7d!2zNTkwIEPDoWNoIE3huqFuZyBUaMOhbmcgVMOhbSwgUGjGsOG7nW5nIDExLCBRdeG6rW4gMywgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1623066637130!5m2!1svi!2s" width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-sm-3"style="margin-top: 30px">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <d>VAPESTORE</d>
                        <br><br>
                        <c>Address:  </c><a href="https://goo.gl/maps/MNKFzXZUVaFEaHb37">590 Cách Mạng Tháng 8, Ward 11, District 3, HCM City</a><br><br>
                        <c>Phone Number: </c><a href="tel:0909678999 ">0909 678999</a><br>
                        <c>Email: </c><a href="mailto:VapeStore@gmail.com">VapeStore@gmail.com</a><br>
                    </address>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit" style="margin-right: 20px">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">

                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <img src="front/images/imgvape/trickortreat.jpg" alt="" style="margin-left: 70px">
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->


@endsection








