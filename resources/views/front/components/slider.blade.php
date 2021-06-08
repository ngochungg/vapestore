<section id="slider"><!--slider-->

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>

                    </ol>

                    <div class="carousel-inner">

                        @foreach($sliders as $key => $slider)
                            <div class="item {{$key==0 ? 'active' : ''}} ">
                            <div class="col-sm-3" style="background-color: black; width: 250px;height: 450px; margin-left: -100px">
                                <h3 style="color: yellow;font-family: 'Lucida Console';">{{$slider->name}}</h3>
                                <p style="color: lightgrey ;font-family:'Palatino Linotype' ">{{$slider->description}}</p>
                            </div>


                            <div class="col-sm-9">
                                <img src="{{$slider->image_path}}"  alt="" width="900px" height="450px" >
                           </div>

                        </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
