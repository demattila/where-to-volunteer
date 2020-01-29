<!doctype html>
<html lang="en">
@include('layouts.head')
<link rel="stylesheet" href="{{asset('css/counter.css')}}">
<body onload="scrolll()">

<!--================ Start Header Menu Area =================-->
@include('layouts.header')
<!--================ End Header Menu Area =================-->

<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>About Us</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start About Us Area =================-->
<section class="about_area section_gap">
    <div class="container">
        <div class="row">
            <div class="single_about row">
                <div class="col-lg-6 col-md-12 text-center about_left">
                    <div class="about_thumb">
                        <img src="{{url('/storage/about/about.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about_right">
                    <div class="about_content">
                        <h2>
                            We are nonprofit team <br>
                            and work worldwide
                        </h2>
                        <p>
                            Their multiply doesn't behold shall appear living heaven second
                            roo lights. Itself hath thing for won't herb forth gathered good
                            bear fowl kind give fly form winged for reason
                        </p>
                        <p>
                            Land their given the seasons herb lights fowl beast whales it
                            after multiply fifth under to it waters waters created heaven
                            very fill agenc to. Dry creepeth subdue them kind night behold
                            rule stars him grass waters our without
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End About Us Area =================-->
<section >
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-body">
                        <h4 class="card-title">Volunteers</h4>
                        <p class="counter">{{$volunteers_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  text-center" >
                    <div class="card-body">
                        <h4 class="card-title">Organizations</h4>
                        <p class="counter">{{$organizations_count}}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-body">
                        <h4 class="card-title">Events</h4>
                        <p class="counter">{{$events_count}}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-body">
                        <h4 class="card-title">Applies</h4>
                        <p class="counter">{{$applies_count}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')
</body>
</html>