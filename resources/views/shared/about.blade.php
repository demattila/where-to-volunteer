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
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->
<section >
    <div class="container mt-10 mb-30">
        <div class="row">
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-body">
                        <h4 class="card-title">@lang('Volunteers')</h4>
                        <p class="counter">{{$volunteers_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  text-center" >
                    <div class="card-body">
                        <h4 class="card-title">@lang('Organizations')</h4>
                        <p class="counter">{{$organizations_count}}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-body">
                        <h4 class="card-title">@lang('Events ')</h4>
                        <p class="counter">{{$events_count}}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-body">
                        <h4 class="card-title">@lang('Applies')</h4>
                        <p class="counter">{{$applies_count}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="about_area">
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
                            Nonprofit csapat vagyunk. <br>
                            Célunk a szervezetek és az önkéntesek kapcsolatának elősegítése.
                        </h2>
                        <p>
                            Hogy kiből és mikor lesz önkéntes, sok tényezőn múlik. Meghatározó szerepe van a belső motivációnak, a jóra és a jobbra való késztetésnek, a változtatásra való hajlandóságnak, a családi háttérnek és ide sorolható kulturális beállítottságunk is. Önkéntes bárkiből, bármikor, bárhol lehet, amennyiben belső indíttatást érez a jó cselekvésre.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="container cellsmoke mb-5">
            <h3>Contact us if you have any ideas, problems or questions</h3>
            <p>support@wtvolunteer.test</p>
            <p>info@wtvolunteer.test</p>
        </div>

    </div>
</section>



<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')
</body>
</html>