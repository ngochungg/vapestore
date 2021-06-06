<div class="col-sm-9">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="mainmenu pull-left">
        <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="{{route('homef')}}" class="active">Home</a></li>
            @foreach( $categoriesLimit as $categoryParent)
                <li class="dropdown"><a href="#">
                    {{ $categoryParent->name }}
                        <i class="fa fa-angle-down"></i></a>
                    @include('front.components.child_menu', ['$categoryParent' => $categoryParent])
            </li>
            @endforeach

            <li><a href="contact-us.html">Contact</a></li>
        </ul>
    </div>
</div>
