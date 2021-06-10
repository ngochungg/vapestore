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

        h4{
            color:gold;
        }
        hr{
            background-color: white;
        }

    </style>

    <h3 style="text-align: center;">
        <hr> Welcome to VapeStore
        <hr>
        <p style="color: orange;"> Online Help	</p>
    </h3>
    <div class="container" style="">
        <div class="row">
            <div class="col-sm-4">
                <h2>1</h2>
                <h4>Buy directly</h4>
                <p>VAPESTORE OFFICIAL </p>
                <p>Address: <a href="https://goo.gl/maps/ADnd4PdLr2YRvz2h8" style="color: white;">590 CMT8, District 3, HCM City </a>  <br>
                    Hotline: <a href="tel:0909 678999" style="color: white;">0909 678999</a>  <br>
                    GMaps -> <a href="https://goo.gl/maps/8jyQsya855nC7XEi9" style="color: white;"> VAPESTORE</a><br>
                    <br>

                    Customers who come to buy can enjoy many good deals from the store.</p>
                <h4>Shopping online</h4>
                <p>Go back to the Home Page and place your order, wonder what else.</p>
                <p></p>
            </div>
            <div class="col-sm-4">
                <h2>2</h2>
                <h4>Transport</h4>

                <h5>COD</h5>
                <p>Delivery to your place, pay directly to the address provided by the customer. Including COD fast delivery to provinces across the country and COD super speed to receive goods right in the inner city of Ho Chi Minh City.</p>

                <h4>Delivery time</h4>
                <p>With fast shipping in the inner city, orders will reach customers in about 30-45 minutes with Aha Move fast ship regardless of the weather, during our operating hours from 09:00 to 22:00 every day. week.</p>
                <p>With the form of COD Express Delivery nationwide, the order will reach customers after about 2-3 days for City and Town routes, 3-5 days for District and remote areas... </p>        </div>

            <div class="col-sm-4">
                <h2>3</h2>

                <h4>Warranty Policy</h4>
                <p>All vape products, pod machines, burners, etc., distributed from VAPESTO, enjoy lifetime technical support, with a team of extremely enthusiastic and hospitable technicians.</p>
                <p>Warranty 30 days for all products. Renewal in the first 7 days from the date of purchase (for manufacturing defects), warranty under extended optional packages applicable to each specific product in the order.</p>

                <h4>Warranty conditions</h4>
                <p>Products with original stamps, boxes and labels, have not been disassembled or repaired. Has not been bumped, dropped or broken. The electronic circuit does not get infiltrated by the oil. Use the device according to the manufacturer's instructions in the product box.</p>

                <h4>Warranty Method</h4>
                <p>Please pack the warranty product and send it to VAPESTORE.</p>
                <ul>
                    <li>Address: 590 CMT8, Distrist 3, HCM City</li>
                    <li>To: Mr Bean- 0909 678999</li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

@endsection


