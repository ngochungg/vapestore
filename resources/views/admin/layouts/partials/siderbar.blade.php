<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('homef')}}" class="brand-link">
        <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VapeStore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="{{route('users.details',['id'=>Auth::user()->id])}}" class="d-block">
                    <img src="{{Auth::user()->image_path}}" class="img-circle elevation-2" alt="User Image">
                </a>
            </div>
            <div class="info">
                <a href="{{route('users.details',['id'=>Auth::user()->id])}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{Url('/home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Product category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('information.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    {{--                    <a href="{{URL :: to('/insert-coupon')}}" class="nav-link">--}}
                    <a href="{{URL :: to('/list-coupon')}}" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Coupon
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('order.processing')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Processing order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('order.complete')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Completed order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('order.cancel')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancel order</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="{{route('slider.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            News
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('new.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('new.comment_index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comment News</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('ReComment')}}" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            Question
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.administrator')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrator User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.customer')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.role')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Role</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
