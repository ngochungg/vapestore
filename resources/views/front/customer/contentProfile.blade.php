
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
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div><!--/tab-pane-->

                <div class="tab-pane " id="edit">
                    <form class="form" action="{{route('users.updateCustomer',['id'=>Auth::user()->id])}}" method="post" id="registrationForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="name"><h4>Name</h4></label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="name" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}"
                                       placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="address"><h4>Address</h4></label>
                                <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}"
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Gender</h4></label>
                                <select id="inputState" class="form-control" name="gender">
                                    @if(Auth::user()->gender == 0)
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    @else
                                        <option value="1">Female</option>
                                        <option value="0">Male</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label><h4>Birthday</h4></label>
                                <input type="date"
                                       class="form-control"
                                       name="birthday" value="{{Auth::user()->birthday}}"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label><h4>Current Password</h4></label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Enter Price Product"
                                       name="current_password"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div>
                                    <label><h4>Avatar</h4></label><br>
                                    <img  src="{{Auth::user()->image_path}}"
                                          class="avatar img-circle img-thumbnail" alt="avatar" id="output"
                                          style="width:300px; display: block; margin-left: auto; margin-right: auto;"><br>
                                    <input type="file"
                                           class="form-control-file"
                                           style="margin-left: 350px;"
                                           name="image_path" onchange="loadFile(event)"/>
                                    <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };
                                    </script>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-xs-2"></div>
                        <button class="btn btn-success col-xs-8" type="submit">
                            <i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                        <div class="col-xs-2"></div>

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

