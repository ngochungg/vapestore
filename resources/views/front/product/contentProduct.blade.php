<!--main area-->
<main id="main" class="main-site">

    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                <li data-thumb="{{$products->feature_image_path}}">
                                    <img src="{{$products->feature_image_path}}" alt="product thumbnail" />
                                </li>
                                @foreach($products->productImages as $productImageItem)
                                    <li data-thumb="{{$productImageItem->image_path}}">
                                        <img src="{{$productImageItem->image_path}}" alt="product thumbnail" />
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="detail-info">
                        <div class="product-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <h2 class="product-name">{{$products->name}}</h2>
                        <div class="short-desc">
                                <div>{!! $products->content !!}</div>
                        </div>
{{--                        <div class="wrap-social">--}}
{{--                            <a class="link-socail" href="#"><img src="{{asset('/front/images/social-list.png')}}" alt=""></a>--}}
{{--                        </div>--}}
                        <div class="wrap-price"><span class="product-price">${{$products->price}}</span></div>
                        </br></br></br>
                        @if($products->quantity>0)
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="1" data-max="120" " >

                                    <a class="btn btn-reduce" href="#"></a>
                                    <a class="btn btn-increase" href="#"></a>
                                </div>
                            </div>
                        @elseif($products->quantity<=0)
                            <div><h3 style="color:red">Out of stock</h3></div>
                        @endif

                        <div class="wrap-butons">
                            <a href="" class="btn add-to-cart">Add to Cart</a>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#Description" class="tab-control-item active">description</a>
                            <a href="#Comment" class="tab-control-item">Question</a>
                            <a href="#Answer" class="tab-control-item">Answer</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="Description">
                                {!!$products->description!!}
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
                                            <div id="respond" class="comment-respond">
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
                            <div class="tab-content-item active" id="Answer">
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
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach($Popular_Products as $Product_pl)
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('seeDetails',['id'=> $Product_pl->id])}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{$Product_pl->feature_image_path}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                       <p><a href="{{route('seeDetails',['id'=> $Product_pl->id])}}" class="product-name"><span></span>{{$Product_pl->name}}</a></p>
                                      <div class="wrap-price"><span class="product-price">{{$Product_pl->price}}</span></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">New Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            @foreach($New_Products as $product_new)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('seeDetails',['id'=> $product_new->id])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{$product_new->feature_image_path}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
{{--                                    <div class="wrap-btn">--}}
{{--                                        <a href="#" class="function-link">quick view</a>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="product-info">
                                    <a href="{{route('seeDetails',['id'=> $product_new->id])}}" class="product-name"><span>{{$product_new->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$product_new->price}}</span></div>
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
