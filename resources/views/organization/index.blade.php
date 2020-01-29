<!doctype html>
<html lang="en">

<head>
    <title>Where To Volunteer?</title>
    @include('layouts.head')
</head>

<body>
@include('layouts.header')

<!--================ Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="banner_content">
                <p class="upper_text">Advertise your events</p>
                <h2>to find helping people</h2>
                <p>
                    That don't lights. Blessed land spirit creature divide our made two
                    itself upon you'll dominion waters man second good you they're divided upon winged were replenish night
                </p>
                <a class="primary_btn yellow_btn text-white" href={{route('organization.register')}}>Register</a>
                <a class="primary_btn mr-20" href={{route('organization.login')}}>Log in<span class="lnr lnr-arrow-right"></span></a>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start CTA Area =================-->
{{--<div class="cta-area section_gap overlay">--}}
    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--@if (Auth::guard('web')->check() )--}}

                {{--<div class="col-lg-6">--}}
                    {{--<h1>You are logged in!</h1>--}}
                    {{--<h4>User name: {{Auth::guard('web')->user()->name}}</h4>--}}
                    {{--<h4>User type: volunteer</h4>--}}

                    {{--<a href="#" class="genric-btn danger circle arrow" onclick="event.preventDefault();--}}
                       {{--document.getElementById('logout-form').submit();">{{ __('Logout') }}<span class="lnr lnr-arrow-right"></span></a>--}}

                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</div>--}}

            {{--@elseif( Auth::guard('web_organization')->check() )--}}

                {{--<div class="col-lg-6">--}}
                    {{--<h1>You are logged in!</h1>--}}
                    {{--<h4>User name: {{Auth::guard('web_organization')->user()->name}}</h4>--}}
                    {{--<h4>User type: organization</h4>--}}
                    {{--<a href="#" class="genric-btn danger circle arrow" onclick="event.preventDefault();--}}
                       {{--document.getElementById('logout-form').submit();">{{ __('Logout') }}<span class="lnr lnr-arrow-right"></span></a>--}}

                    {{--<form id="logout-form" action="{{ route('organization.logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</div>--}}

            {{--@else--}}

                {{--<div class="col-lg-6">--}}
                    {{--<h1>Become a volunteer</h1>--}}
                    {{--<p>--}}
                        {{--Start searching for the greatest activities, apply easily and give a hand.--}}
                    {{--</p>--}}
                    {{--<a href="{{ route('register') }}" class="primary_btn yellow_btn rounded">Register</a>--}}
                    {{--<a href="{{ route('login') }}" class="primary_btn yellow_btn rounded">Login<span class="lnr lnr-arrow-right"></span></a>--}}
                {{--</div>--}}

                {{--<div class="col-lg-6">--}}
                    {{--<h1>Advertise your events</h1>--}}
                    {{--<p>--}}
                        {{--After registering your organization you can start advertising your events.--}}
                    {{--</p>--}}
                    {{--<a href="{{ route('organization.register') }}" class="primary_btn yellow_btn rounded">Register</a>--}}
                    {{--<a href="{{ route('organization.login') }}" class="primary_btn yellow_btn rounded">Login<span class="lnr lnr-arrow-right"></span></a>--}}
                {{--</div>--}}

            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!--================ End CTA Area =================-->

<!--================ Start Story Area =================-->
<section class="section_gap story_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="main_title">
                    <h2>@lang('Our latest Story')</h2>
                    <p>
                        @lang('Open lesser winged midst wherein may morning')
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-story -->
            @foreach($latestStories as $story)
                <div class="col-lg-4 col-md-6">
                    <div class="single-story">
                        <div class="story-thumb">
                            <img class="img-fluid" src="{{$story->image_url}}" style="height: 220px">
                        </div>
                        <div class="story-details">
                            <div class="story-meta">
                                <a href="#">
                                    <span class="lnr lnr-calendar-full"></span>
                                    {{$story->created_at}}
                                </a>
                                <a href="#">
                                    <span class="lnr lnr-book"></span>
                                    {{$story->owner->name}}
                                </a>
                            </div>
                            <h5>
                                <a href="{{route('stories.show',$story)}}">
                                    {{$story->title}}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Story Area =================-->

<!--================ Start Subscribe Area =================-->
<div class="container">
    <div class="subscribe_area">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center">
                    <h1 class="text-white">Do you have a question?</h1>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                            <div class="input-group d-flex flex-row">
                                <input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                <button class="ml-10 primary_btn yellow_btn btn sub-btn rounded">SUBSCRIBE</button>
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================ End Subscribe Area =================-->

<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')
{{--<script src="js/jquery-3.2.1.min.js"></script>--}}
{{--<script src="js/popper.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/stellar.js"></script>--}}
{{--<script src="vendors/lightbox/simpleLightbox.min.js"></script>--}}
{{--<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>--}}
{{--<script src="js/jquery.ajaxchimp.min.js"></script>--}}
{{--<script src="js/mail-script.js"></script>--}}
{{--<script src="js/countdown.js"></script>--}}
{{--<!--gmaps Js-->--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>--}}
{{--<script src="js/gmaps.min.js"></script>--}}
{{--<script src="js/theme.js"></script>--}}
</body>
</html>