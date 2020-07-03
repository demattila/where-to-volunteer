<!doctype html>
<html lang="en">
<head>
    <title>Events</title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{asset('css/fav.css')}}">
    <link rel="stylesheet" href="{{asset('css/limit-chars.css')}}">
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
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start Recent Event Area =================-->
<section class="event_area section_gap_top">
    <div class="container">
        <div class="main_title">
            <h2 class="mb-10">@lang('Upcoming events')</h2>

            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    {{--<form class="form-inline justify-content-center" method="get" action="{{ route('events.index') }}" >--}}
                        <div class="form-group">
                            <input type="text" name="event_name" id="event_name" class="form-control single-input" data-url="{{route('events.fetch')}}" placeholder="@lang('Search')" />
                            <div style="position: absolute">
                                <ul id="eventList" id class="dropdown-menu list">
                                </ul>
                            </div>
                        </div>
                        {{--<button type="submit" class="genric-btn primary m-2">{{ __('Search') }}</button>--}}
                    {{--</form>--}}
                </div>
                <div class="col-lg-4"></div>
            </div>

            <div class="cellsmoke" style="position: relative;">
                @include('event.filter',['filters' => $filters])

            </div>
        </div>
        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-6" >
                    <div class="single_event cellsmoke_event">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <figure>
                                    <img class="img-fluid w-100" src="{{$event->image_url}}" alt="">
                                    <div class="img-overlay"></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content_wrapper">
                                    <h4 class="title">
                                        <a href="{{route('events.show',$event)}}">{{$event->title}}</a>
                                    </h4>
                                    <p><b>{{$event->city}}, {{$event->region}}</b></p>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-6" style="padding: 0; display: block;margin-left: auto;margin-right: auto;width: 20px;">
                                @if($volunteerSignedIn || $organizationSignedIn)
                                <p id="deletefavourite{{$event->id}}"
                                   onClick="deleteFromFavourites({{$event->id}})"
                                   name="addfavourite"
                                   class="btn btn-lg"
                                   style="{{ $event->favorited() ? '' : 'display: none;' }} padding: 0;">
                                    <i class="fas fa-star"></i>
                                </p>

                                <p id="addfavourites{{$event->id}}"
                                   onClick="addToFavourites({{$event->id}})"
                                   name="deletefavourite"
                                   class="btn btn-lg"
                                   style="{{ $event->favorited() ? 'display: none;' : '' }} padding: 0;">
                                    <i class="far fa-star" ></i>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="four-line-event-box">
                            {{$event->description}}
                        </div>
                        <div>
                            <a href="{{route('events.show',$event)}}" class="genric-btn primary medium mt-2">@lang('Learn More')</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        {{$events->links()}}
    </div>
</section>
<!--================ End Recent Event Area =================-->

<div id="dialog">
    <h6><a href="/dashboard" id="mess"></a></h6>
</div>

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

