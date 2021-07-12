<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
    /*input[type=text], select, textarea {*/
    /*    width: 100%;*/
    /*    padding: 12px;*/
    /*    border: 1px solid #ccc;*/
    /*    border-radius: 4px;*/
    /*    box-sizing: border-box;*/
    /*    margin-top: 6px;*/
    /*    margin-bottom: 16px;*/
    /*    resize: vertical;*/
    /*    */
    /*}*/
    /*a {*/
    /*    width: 100%;*/
    /*    padding: 12px;*/
    /*    border-radius: 4px;*/
    /*    box-sizing: border-box;*/
    /*    margin-top: 6px;*/
    /*    margin-bottom: 16px;*/
    /*    resize: vertical;*/
    /*}*/
    .checked {
        color: #ffc700;
    }
    .misscheck{
        color: #ccc;
    }
    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    .rate{
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        visibility: hidden;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    /*.fa{*/
    /*    font-size:25px;*/
    /*    margin-left: 2px;*/
    /*}*/
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
</style>
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css')}}">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
    <div>
        <h4>Name</h4>
        <div style="font-size: 16px">{{Auth::user()->name}}</div>
    </div>
    <div>
        <h4>Phone</h4>
        <div style="font-size: 16px">{{Auth::user()->phone}}</div>
    </div>
    <div>
        <h4>Address</h4>
        <div style="font-size: 16px">{{Auth::user()->address}}</div>
    </div>
    <div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($DetailOrders as $Detail)
            @if($orders->order_status == 'Processed')
                <tr>
                    <td>{{$Detail->product_name}}</td>
                    <td>${{$Detail->product_price}}</td>
                    <td>{{$Detail->product_sales_quantity}}</td>
                    <td>${{ $Detail->product_sales_quantity * $Detail->product_price }}</td>
                </tr>
                @if($Detail->rating==0)
                <tr>
                    <td colspan="4" style="background-color:#f2f2f2; text-align: left; ">
                        <form action="{{route('rating',$Detail->product_id)}}" method="POST">
                            <div style="width:95%;margin-left:5%;">
                                <label for="fname">Rating</label>
                                <input type="hidden" name="_token"value="{{csrf_token()}}">
                                <input type="hidden" name="id"value="{{$Detail->product_id}}">
                                <input type="hidden" name="detail_id"value="{{$Detail->order_details_id}}">
                                <div class="rate">
                                    <input type="radio" id="star5{{$Detail->product_id}}" name="rate" value="5"/>
                                    <label for="star5{{$Detail->product_id}}" title="text" >5 stars</label>
                                    <input type="radio" id="star4{{$Detail->product_id}}" name="rate" value="4" />
                                    <label for="star4{{$Detail->product_id}}" title="text">4 stars</label>
                                    <input type="radio" id="star3{{$Detail->product_id}}" name="rate" value="3" />
                                    <label for="star3{{$Detail->product_id}}" title="text">3 stars</label>
                                    <input type="radio" id="star2{{$Detail->product_id}}" name="rate" value="2" />
                                    <label for="star2{{$Detail->product_id}}" title="text">2 stars</label>
                                    <input type="radio" id="star1{{$Detail->product_id}}" name="rate" value="1" />
                                    <label for="star1{{$Detail->product_id}}" title="text">1 star</label>
                                </div>
                            </div>
                            <div style="width:95%;margin-left:5%;margin-top:3px;">
                                <label for="fname">Comment</label>
                                <input type="text" id="fname" name="comment" placeholder="Your comment.." required>
                            </div>
                            <div style=" width:95%;margin-left:5%;margin-top:3px; ">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @else
                <tr>
                    <td colspan="4" style="background-color:#f2f2f2; text-align: left; ">
                        <div style="width:95%;margin-left:5%;">
                            <label for="fname">Rating</label>
                            <input type="hidden" name="_token"value="{{csrf_token()}}">
                            <input type="hidden" name="id"value="{{$Detail->product_id}}">
                            @if($Detail->rating==1)
                            <div class="rate" style="margin-left: 660px;">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star misscheck" ></span>
                                <span class="fa fa-star misscheck" ></span>
                                <span class="fa fa-star misscheck" ></span>
                                <span class="fa fa-star misscheck" ></span>
                            </div>
                            @endif
                            @if($Detail->rating==2)
                            <div class="rate" style="margin-left: 660px;">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star misscheck" ></span>
                                <span class="fa fa-star misscheck" ></span>
                                <span class="fa fa-star misscheck" ></span>
                            </div>
                            @endif
                            @if($Detail->rating==3)
                            <div class="rate" style="margin-left: 660px;">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star misscheck" ></span>
                                <span class="fa fa-star misscheck" ></span>
                            </div>
                            @endif
                            @if($Detail->rating==4)
                            <div class="rate" style="margin-left: 660px;">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star misscheck" ></span>
                            </div>
                            @endif
                            @if($Detail->rating==5)
                            <div class="rate" style="margin-left: 660px;">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            @endif
                        </div>
                        <div style="width:95%;margin-left:5%;margin-top:3px;">
                            <label for="fname">Comment:</label>
                            <a id="fname">{{$Detail->comment}}</a>
                        </div>
                    </td>
                </tr>
                @endif
            @elseif($orders->order_status != 'Cancel')
                <tr>
                    <td>{{$Detail->product_name}}</td>
                    <td>${{$Detail->product_price}}</td>
                    <td>{{$Detail->product_sales_quantity}}</td>
                    <td>${{ $Detail->product_sales_quantity * $Detail->product_price }}</td>
                </tr>
            @endif
        @endforeach

        <tr>
            <th colspan="3">Status:
            @if($orders->order_status == 'New order')
                    Orders are waiting for confirmation
            @elseif($orders->order_status == 'Cancel')
                    Order is canceled
            @elseif($orders->order_status == 'Processing')
                    Order is being shipped
            @elseif($orders->order_status == 'Processed')
                    Order completed
                @endif
            </th>
            @if($orders->order_status == 'New order')
            <td colspan="1">Total: ${{$orders->order_total}}</td>
            @else
                <th>Total: ${{$orders->order_total}}</th>
            @endif
        </tr>
        @if ($orders->order_status == 'New order')
            <tr>
                <td colspan="4">
                    <a class='btn btn-danger col-md-12' href="{{route('order_Cancel',['id'=>$orders->order_id])}}">Cancel order</a>
                </td>
            </tr>
        @endif


        </tbody>
    </table></div>
</div>
<div class="col-md-2"></div>
</div>
<hr>


