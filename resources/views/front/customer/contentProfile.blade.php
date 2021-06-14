<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>Profile</h1></div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <img style="width:300px" src="{{Auth::user()->image_path}}" class="avatar img-circle img-thumbnail" alt="avatar">
            </div></hr><br>

        </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#Information">Information</a></li>
                <li><a data-toggle="tab" href="#edit">Change Information</a></li>
                <li><a data-toggle="tab" href="#history">Order history</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="Information">
                    <h2>Information</h2>
                    <hr>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name</b> <a style="float: right!important;">{{Auth::user()->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a style="float: right!important;">{{Auth::user()->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b><a style="float: right!important;">{{Auth::user()->phone}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Birthday</b> <a style="float: right!important;">{{Auth::user()->birthday}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> <a style="float: right!important;">
                                    @if( Auth::user()->gender == 0)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Address</b><a style="float: right!important;">{{Auth::user()->address}}</a>
                            </li>
                        </ul>
                </div><!--/tab-pane-->
                <div class="tab-pane " id="edit">
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
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

                </div><!--/tab-pane-->
                <div class="tab-pane" id="history">
                    <h2></h2>
                    <hr>
                </div><!--/tab-pane-->

            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </div><!--/col-9-->
</div><!--/row-->
<br><br>
<br><br><br><br><br><br>
