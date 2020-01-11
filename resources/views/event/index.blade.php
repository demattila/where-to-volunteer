<!doctype html>
<html lang="en">
<head>
    <title>Events</title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{asset('css/fav.css')}}">
</head>

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
                <h2>Events</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->



<!--================ Start Recent Event Area =================-->
<section class="event_area section_gap_top">
    <div class="container">
        <div class="main_title">
            <h2>Upcoming events</h2>
            {{--<p>Creepeth called face upon face yielding midst is after moveth </p>--}}

            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    {{--<form class="form-inline justify-content-center" method="get" action="{{ route('events.index') }}" >--}}
                        @csrf
                        <div class="form-group">
                            <input type="text" name="event_name" id="event_name" class="form-control single-input" data-url="{{route('events.fetch')}}" placeholder="Search" />
                            <div id="eventList">
                            </div>
                        </div>
                        {{--<button type="submit" class="genric-btn primary m-2">{{ __('Search') }}</button>--}}
                    {{--</form>--}}
                </div>
                <div class="col-lg-4"></div>
            </div>

            {{--@include('event.filter',[--}}
              {{--'regions' => $regions,--}}
              {{--'categories' =>$categories,--}}
              {{--])--}}
            @include('event.filter')
        </div>
        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-6" >
                    <div class="single_event">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <figure>
                                    <img class="img-fluid w-100" src="{{$event->image_url}}" alt="">
                                    <div class="img-overlay"></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content_wrapper">

                                        <h3 class="title mr-2">
                                            <a href="{{route('events.show',$event)}}">{{$event->title}}</a>
                                            {{--<div class="click_fav">--}}
                                                {{--<span class="fa fa-star-o"></span>--}}
                                                {{--<div class="ring"></div>--}}
                                                {{--<div class="ring2"></div>--}}
                                            {{--</div>--}}


                                        {{--@if(auth()->guard('web')->check())--}}
                                            {{--@if( auth()->user()->isFavorite($event) )--}}
                                                {{--<button type="button" class="btn" onclick="event.preventDefault();--}}
                                                    {{--document.getElementById('unfavorite-form-{{$event->id}}').submit();">--}}
                                                    {{--<span class="fas fa-star"></span>--}}
                                                {{--</button>--}}
                                                {{--<form id="unfavorite-form-{{$event->id}}" action="{{route('events.unfavorite', $event)}}" method="POST" style="display: none;">--}}
                                                    {{--@method('delete')--}}
                                                    {{--@csrf--}}
                                                {{--</form>--}}
                                            {{--@else--}}
                                                {{--<button type="button" class="btn" onclick="event.preventDefault();--}}
                                                        {{--document.getElementById('favorite-form-{{$event->id}}').submit();">--}}
                                                    {{--<span class="far fa-star"></span>--}}
                                                {{--</button>--}}
                                                {{--{{dump(route('events.favorite', $event))}}--}}
                                                {{--{{dump(route('events.unfavorite', $event))}}--}}
                                                {{--<form id="favorite-form-{{$event->id}}" action="{{route('events.favorite', $event)}}" method="POST" style="display: none;">--}}
                                                    {{--@csrf--}}
                                                {{--</form>--}}
                                            {{--@endif--}}
                                        {{--@endif--}}
                                            <button id="deletefavourite{{$event->id}}"
                                                    onClick="deleteFromFavourites({{$event->id}})"
                                                    name="addfavourite"
                                                    class="btn btn-lg"
                                                    style="{{ $event->favorited() ? '' : 'display: none;' }}">
                                                <i class="fas fa-star"></i>
                                            </button>

                                            <!-- hide if favourited -->
                                            <button id="addfavourites{{$event->id}}"
                                                    onClick="addToFavourites({{$event->id}})"
                                                    name="deletefavourite"
                                                    class="btn btn-lg"
                                                    style="{{ $event->favorited() ? 'display: none;' : '' }}">
                                                <i class="far fa-star" ></i>
                                            </button>
                                    </h3>
                                    {{--<h2>--}}
                                        {{--<span>--}}
                                                {{--<a href="#">--}}
                                                    {{--<i  class="far fa-star"></i>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" >--}}
                                                    {{--<i  class="fas fa-star"></i>--}}
                                                {{--</a>--}}
                                            {{--</span>--}}
                                    {{--</h2>--}}

                                <!-- set color and hide if not favourited -->

                                    <p>
                                        {{$event->description}}
                                    </p>
                                    <a href="{{route('events.show',$event)}}" class="primary_btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        {{$events->links()}}
    </div>
</section>
<!--================ End Recent Event Area =================-->
<!--================ Start Subscribe Area =================-->
{{--<div class="container">--}}
    {{--<div class="subscribe_area">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<div class="d-flex align-items-center">--}}
                    {{--<h1 class="text-white">Do you have a question?</h1>--}}
                    {{--<div id="mc_embed_signup">--}}
                        {{--<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">--}}
                            {{--<div class="input-group d-flex flex-row">--}}
                                {{--<input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">--}}
                                {{--<button class="ml-10 primary_btn yellow_btn btn sub-btn rounded">SUBSCRIBE</button>--}}
                            {{--</div>--}}
                            {{--<div class="info"></div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!--================ End Subscribe Area =================-->

<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')

<script>
    function addToFavourites(itemid) {
        // var user_id = userid;
        var item_id = itemid;

        $.ajax({
            type: 'post',
            url: '/event/favorite',
            data: {
                // 'user_id': user_id,
                'item_id': item_id,
                _token: '{{csrf_token()}}'
            },
            success: function () {
                // hide add button
                $('#addfavourites' + item_id).hide();
                // show delete button
                $('#deletefavourite' + item_id).show();
            },
            error: function (XMLHttpRequest) {
                // handle error
            }
        });
    }

    function deleteFromFavourites(itemid) {
        // var user_id = userid;
        var item_id = itemid;

        $.ajax({
            type: 'post',
            url: '/event/unfavorite',
            data: {
                // 'user_id': user_id,
                'item_id': item_id,
                _token: '{{csrf_token()}}'
            },
            success: function () {
                // show add button
                $('#addfavourites' + item_id).show();
                // hide delete button
                $('#deletefavourite' + item_id).hide();
            },
            error: function (XMLHttpRequest) {
                // handle error
            }
        });
    }

</script>
</body>
</html>

