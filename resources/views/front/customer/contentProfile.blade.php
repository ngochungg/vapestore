
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css')}}">
<div class="container bootstrap snippet wrap-info-cus">
    <div class="row">
{{--        <div class="col-sm-3"><!--left col-->--}}
{{--            <div class="text-center">--}}
{{--                <img style="width:300px" src="{{Auth::user()->image_path}}" class="avatar img-circle img-thumbnail" alt="avatar">--}}
{{--            </div></hr><br>--}}

{{--        </div><!--/col-3-->--}}
        <div class="col-sm-12">
            <ul class="nav nav-tabs" >
                <li class="active nav-info"><a data-toggle="tab" href="#Information">Information</a></li>
                <li class="nav-info"><a data-toggle="tab" href="#edit">Change Information</a></li>
                <li class="nav-info"><a data-toggle="tab" href="#history">Order history</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="Information">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="avatarBox-cus"><img class='img-fluid' src="{{Auth::user()->image_path}}" alt="User profile picture" ></div>
                        </div>
                        <div class="col-md-5">
                            <br><br><br>
                            <p class="sayHi">Hello</p>
                            <h1>I'm {{Auth::user()->name}}</h1>
                            <div  class="fa fa-user-md" aria-hidden="true">
                                <i style="font-family: Arial; font-weight: 300"> @if( Auth::user()->role == 2)
                                        Admin VapeStore
                                    @else
                                        Customer
                                    @endif</i>
                            </div>
                            <hr>

                            <div class='detailInfo'>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Name:</div>
                                    <div class='col-lg-8 col-12 b'>{{Auth::user()->name}}</div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Gender:</div>
                                    <div class='col-lg-8 col-12 b'>
                                        @if( Auth::user()->gender == 0)
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Address:</div>
                                    <div class='col-lg-8 col-12 b'>{{Auth::user()->address}}</div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>BirthDay:</div>
                                    <div class='col-lg-8 col-12 b'>{{Auth::user()->birthday}}</div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Phone:</div>
                                    <div class='col-lg-8 col-12 b'><a href='https://azteam.host/'>{{Auth::user()->phone}}</a></div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Email:</div>
                                    <div class='col-lg-8 col-12 b'><a href='mailto:{{Auth::user()->name}}'>{{Auth::user()->email}}</a></div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Create At:</div>
                                    <div class='col-lg-8 col-12 b'>{{Auth::user()->created_at}}</div>
                                </div>
                                <div class='row my-2'>
                                    <div class='col-lg-4 col-12 boldd'>Update At:</div>
                                    <div class='col-lg-8 col-12 b'>{{Auth::user()->updated_at}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div><!--/tab-pane-->

                <div class="tab-pane " id="edit">

                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-12">
                                <label for="first_name"><h4>Name</h4></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Last name</h4></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile"><h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Location</h4></label>
                                <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password"><h4>Password</h4></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2"><h4>Verify</h4></label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                </div><br>
                <div class="tab-pane" id="history">
                    <h2></h2>
                    <hr>
                </div><!--/tab-pane-->

            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </div><!--/col-9-->
</div><!--/row-->
<hr>

