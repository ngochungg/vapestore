<!--main area-->
<style>
    .results {
  font-size: 0;
  padding-bottom: 16px;
}
.results-content {
  font-size: 13px;
  display: inline-block;
  margin-left: 20px;
  vertical-align: top;
  background: url('https://i.stack.imgur.com/rwkqF.png') 0 0 repeat-x;
  width: 185px;
  height: 35px;
}
.results .results-content span.stars span {
  background: url('https://i.stack.imgur.com/rwkqF.png') 0 -36px repeat-x;
  display: inline-block;
  height: 35px;

}
    /*input[type=text], select, textarea {*/
    /*    width: 100%;*/
    /*    padding: 12px;*/
    /*    border: 1px solid #ccc;*/
    /*    border-radius: 4px;*/
    /*    box-sizing: border-box;*/
    /*    margin-top: 6px;*/
    /*    margin-bottom: 16px;*/
    /*    resize: vertical;*/

    /*}*/
    /*a {*/
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
        height: 30px;
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
<main id="main" class="main-site">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides" >
                                <li data-thumb="{{$products->feature_image_path}}" >
                                    <img src="{{$products->feature_image_path}}" alt="product thumbnail" style="max-width: 500px;margin-left: 50px">
                                </li>
                                @foreach($products->productImages as $productImageItem)
                                    <li data-thumb="{{$productImageItem->image_path}}" style="width: 500px;">
                                        <img src="{{$productImageItem->image_path}}" alt="product thumbnail" style="max-width: 500px;margin-left: 50px;">
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="detail-info" style="margin-left:0px">
                        <h2 class="product-name">{{$products->name}}</h2>
                        <div class="wrap-price" style="margin-top: 5px"><span class="product-price" style="color: #fa2210;"> ${{$products->price}}</span></div>
                        <hr style="max-width: 70%">
                        <div class="results">
                            <div class="results-content">
                                <div class="row" style="    width: 400px;">
                                    <div class="col-md-8">
                                        <span class="stars">{{$avg}}</span>
                                    </div>
                                    <div class="col-md-4" style= "font-size: 25px;">
                                    {{$avg}} Star
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="pro-content">{!! $products->content !!}</div>

                        <hr style="max-width: 70%">
                        @if($products->quantity>0)
                            <h4>Quantity:</h4>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <a class="btn btn-reduce" href="#"></a>
                                        <input type="text" id="cart-quantity" name="product-quatity" value="1" data-max="{!! $products->quantity !!}">
                                    <a class="btn btn-increase" href="#"></a>
                                </div>
                                <h6>The remaining amount {{$products->quantity }}</h6>
                            </div>
                            <div class="wrap-butons">
                                <a href="#" id="add-to-cart" data-pid="{{ $products->id }}" class="btn add-to-cart" style="background: orange ">
                                    Add to cart
                                </a>
                            </div>
                        @elseif($products->quantity<=0)
                            <div><h3 style="color:red">Out of stock</h3></div>
                        @endif

                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item">Description</a>
                            <a href="#benefit" class="tab-control-item">Benefit</a>
                            <a href="#Comment" class="tab-control-item">Question</a>
                            <a href="#Answer" class="tab-control-item">Answer</a>
                            <a href="#Rating" class="tab-control-item">User Rating</a>
                        </div>
                        <div class="tab-contents ative">

                            <div class="tab-content-item active" id="description">
                                <div class="pro-content">{!! $products->description !!}</div>
                            </div>
                            <div class="tab-content-item " id="Comment">
                                <div class="wrap-review-form">
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">Comment</h2>
                                        <ol class="commentlist">

                                        </ol>
                                    </div><!-- #comments -->

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond ">
                                                <form action="{{route('Comment',['id'=> $products->id])}}" method="post" id="commentform" class="comment-form" novalidate="">
                                                    @csrf
                                                    <p class="comment-notes">
                                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                    </p>
                                                    <p class="comment-form-author">
                                                        <label for="author">Name <span class="required">*</span></label>
                                                        <input id="author" name="name" type="text" value="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input id="email" name="email" type="email" value="" >
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your Comment <span class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                    </p>
                                                </form>

                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper -->

                                </div>
                            </div>
                            <div class="tab-content-item " id="benefit">
                                <div class="widget widget-our-services ">
                                    <div class="widget-content">
                                        <ul class="our-services">

                                            <li class="service">
                                                <a class="link-to-service" href="{{'/Online-help'}}" target="_blank">
                                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                                    <div class="right-content">
                                                        <b class="title">Free Shipping</b>
                                                        <span class="subtitle">On Oder Over $99</span>
                                                        <p>Applies to all orders over $99. You just need to order everything and we will take care of it</p>
                                                        <p class="desc"></p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="service">
                                                <a class="link-to-service" href="{{'/Online-help'}}" target="_blank">
                                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                                    <div class="right-content">
                                                        <b class="title">Special Offer</b>
                                                        <span class="subtitle">Get a gift!</span>

                                                        <p>Take the gift if you are the lucky man.</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="service">
                                                <a class="link-to-service" href="{{'/Online-help'}}" target="_blank">
                                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                                    <div class="right-content">
                                                        <b class="title">Order Return</b>
                                                        <span class="subtitle">Return within 7 days</span>
                                                        <p>If you are not satisfied with the product, you can return it within 7 days. Not applicable in case of falling into a tank or in water.</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- Categories widget-->
                            </div>
                            <div class="tab-content-item " id="Answer">
                                @foreach($products->commentProduct as $comment)
                                        <div>
                                            <ul>
                                                <li>
                                            <h5>Name: {{$comment->name}} <span class="text-muted ">({{$comment->created_at}})</span></h5>
                                            <span class="m-b-15 d-block"><b>Question:</b> {{$comment->comment}} </span>
                                                </li>
                                                <ul><li>
                                                        @if($comment->reply=='')
                                                            <b>Admin: </b>shop will answer your question as soon as possible
                                                        @else
                                                            <b>Admin: </b>{{$comment->reply}}
                                                        @endif
                                                    </li></ul>
                                            </ul>
                                        </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="tab-content-item" id="Rating" style="overflow: scroll; height: 200px;">
                            @foreach($id_order as $i)
                            @if($i->rating!=0 AND $i->show_order==1)
                                Writed by <b>{{$i->order->customer->name}}</b>
                                <div style="background: #F0F0E9;">
                                    <div class="rate" style="font-size: 15px;">
                                    <br>
                                        @if($i->rating==1)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        @endif
                                        @if($i->rating==2)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        @endif
                                        @if($i->rating==3)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        @endif
                                        @if($i->rating==4)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star misscheck" ></span>
                                        @endif
                                        @if($i->rating==5)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        @endif
                                    </div>
                                    <br>
                                    <div style="width:95%;margin-left:5%;margin-top:3px;">
                                        <label for="fname">Comment:</label>
                                        <a id="fname">
                                            {{$i->comment}}
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 sitebar">


{{--                <div class="widget mercado-widget widget-product">--}}
{{--                    <h2 class="widget-title">Popular Products</h2>--}}
{{--                    <div class="widget-content">--}}
{{--                        <ul class="products">--}}
{{--                            @foreach($Popular_Products as $Product_pl)--}}
{{--                            <li class="product-item">--}}
{{--                                <div class="product product-widget-style">--}}
{{--                                    <div class="thumbnnail">--}}
{{--                                        <a href="{{route('seeDetails',['id'=> $Product_pl->id])}}" title="Click to go to product">--}}
{{--                                            <figure><img src="{{$Product_pl->feature_image_path}}" alt=""></figure>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                       <p><a href="{{route('seeDetails',['id'=> $Product_pl->id])}}" class="product-name"><span></span>{{$Product_pl->name}}</a></p>--}}
{{--                                      <div class="wrap-price"><span class="product-price" style="color: indianred">${{$Product_pl->price}}</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            @endforeach--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box" style="border-radius: 3px">Related products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            @foreach($relatedProducts as $product_new)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail" >
                                    <a href="{{route('seeDetails',['id'=> $product_new->id])}}" title="Click to go to {!! $product_new->name !!}" >
                                        <div style="max-width: 200px;word-wrap: break-word"><img src="{{$product_new->feature_image_path}}" style="height: 200px;max-width: 200px;margin-left: 0px" alt=""></div>
                                    </a>
{{--                                    <div class="group-flash">--}}
{{--                                        <span class="flash-item new-label">new</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="wrap-btn">--}}
{{--                                        <a href="#" class="function-link">quick view</a>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="product-info">
                                    <a href="{{route('seeDetails',['id'=> $product_new->id])}}" class="product-name" style="font-size: 18px"><span>{{$product_new->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price"  style="color: orange;font-weight: 300; font-size: 13px" >${{$product_new->price}}</span></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>


<!--main area-->
