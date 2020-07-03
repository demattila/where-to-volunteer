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


<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')
</body>
</html>