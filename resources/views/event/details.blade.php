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
                    <p>
                        {{$event->description}}
                    </p>
                    <ul>
                        <li style="font-size: 20px"><b>{{$event->starts_at->format('H:i d-m-Y')}} - {{$event->ends_at->format('H:i d-m-Y')}}</b></li>
                        <li><b>{{$event->address}}</b></li>
                        <li><b>{{$event->city}}, {{$event->region}}</b></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="cellsmoke">
            <h5>What should volunteers do?</h5>
            <p>{{$event->mission}}</p>
            <h5>Reward</h5>
            <p>{{$event->reward}}</p>
            <h5>More info</h5>
            <p>{{$event->info}}</p>
        </div>

            @if(Auth::guard('web')->check())
                <div class="container cellsmoke" style="margin-top: 20px">
                    <h3 class="mb-4">Options</h3>
                    @if($event->starts_at <= now() )
                        <p><strong><i class="far fa-frown"></i>  Sorry, this event has been ended.</strong></p>
                        <p>Find other events <a href="{{route('events.index')}}" >here</a>! </p>
                    @elseif($user->isApplied($event))
                        @if($user->applyStatus($event) == 0)
                        <p>
                            <strong><i class="far fa-smile-wink"></i>  You applied to this event! Waiting for the response..</strong>
                        </p>
                        @endif
                        @if($user->applyStatus($event) == 1)
                            <p>
                                <strong><i class="far fa-smile-wink"></i> Your apply has been accepted. Good luck!</strong>
                            </p>
                        @endif
                            @if($user->applyStatus($event) == 2)
                                <p><strong><i class="far fa-frown"></i>  Sorry, your apply has been rejected. Find an other event! </strong></p>
                            @endif
                        <a href="{{ route('apply.cancel', $event) }}" class="genric-btn danger" onclick="event.preventDefault();
                                                                   document.getElementById('cancel-form').submit();">
                            Cancel the apply
                        </a>

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
                </div>
                @if($user->isApplied($event) && $user->applyStatus($event) == 1)
                <div class="container cellsmoke" style="margin-top: 20px">
                    <h3 class="mb-4">Event owner information</h3>
                    <div style="margin-bottom: 20px">
                        <h5>{{$event->owner->name}}</h5>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" style="max-width: 15rem" src="{{$event->owner->image_url}}">
                            </div>
                            <div class="col-md-4">
                                <h6>Data</h6>
                                <p>Contact person: <b>{{$event->owner->contact_person}}</b></p>
                                <p>Organization type: <b>{{$event->owner->type->name}}</b></p>
                                <p>Site: <b>{{$event->owner->site}}</b></p>
                                <p><i class="fas fa-calendar-day"></i> Founded at: <b>{{$event->owner->founded_at}}</b></p>
                                <p><i class="fas fa-address-card"></i> Address: <b>{{$event->owner->city}}, {{$event->owner->region}}</b></p>
                                {{--<p><i class="fas fa-briefcase"></i> <b>{{$volunteer->works_at}}</b></p>--}}
                            </div>
                            <div class="col-md-4">
                                <h6>Contact</h6>
                                <p><b>{{$event->owner->mobile}}</b></p>
                                <p><b>{{$event->owner->email}}</b></p>
                            </div>
                        </div>
                        <div class="container">
                            <h6>Description: </h6>
                            <p>{{$event->owner->description}}</p>
                        </div>
                    </div>
                </div>
                @endif
            @elseif(!$organizationSignedIn)
                <div class="container cellsmoke" style="margin-top: 20px">
                <p>Login required to apply to the event. <a href="{{route('index')}}">Click here to log in!</a></p>
                </div>
            @endif
    </div>
</section>

@include('layouts.footer')

@include('layouts.scripts')

</body>
</html>