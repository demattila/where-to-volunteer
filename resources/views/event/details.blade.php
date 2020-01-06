<!doctype html>
<html lang="en">
<head>
    <title>Event details</title>
    @include('layouts.head')
</head>
<body>

@include('layouts.header')


<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Event Details</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start Recent Event Area =================-->
<section class="condition-area event-details-area section_gap">
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="condition-left">
                    <img class="img-fluid" src="{{$event->image_url}}" alt="">
                </div>
            </div>
            <div class="offset-lg-1 col-lg-5">
                <div class="condition-right">
                    <h2 class="mb-20">
                        {{$event->title}}
                    </h2>
                    <div>
                    <favorite
                            :event=1
                            :favorited=true
                    ></favorite>
                    </div>
                    <p>
                        If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may
                        see some for as low as each. If you are looking at blank cassettes on the web, you may be very confused at the
                        difference in price You may see.
                    </p>
                    <p>
                        If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may
                        see some for as low as each. If you are looking at blank cassettes on the web, you may be very confused at the
                        difference in price You may see.
                    </p>
                    <ul>
                        <li>{{$event->starts_at}}</li>
                        <li>{{$event->address}}</li>
                        <li>{{$event->city}}, {{$event->region}}.</li>
                    </ul>

                    <a href="{{route('events.index')}}" class="genric-btn primary">Back!</a>

                    @if(Auth::guard('web')->check())
                        @if(auth()->user()->isApplied($event))
                            <a href="{{ route('apply.cancel', $event) }}" class="genric-btn danger" onclick="event.preventDefault();
                                                                   document.getElementById('cancel-form').submit();">
                                Cancel the apply
                            </a>
                            <div class="alert alert-success">
                                You applied!
                            </div>
                        @else
                            <a href="{{ route('apply', $event) }}" class="genric-btn success" onclick="event.preventDefault();
                                                                   document.getElementById('apply-form').submit();">
                                Apply to event
                            </a>
                        @endif
                        <form id="apply-form" method="POST" action="{{ route('apply', $event) }}" style="display: none;">
                            @csrf
                        </form>
                        <form id="cancel-form" method="POST" action="{{ route('apply.cancel', $event) }}" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    @endif


                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Recent Event Area =================-->

@include('layouts.footer')

@include('layouts.scripts')

</body>
</html>