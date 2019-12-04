<section class="event_area section-top-border">
    @if($events->isEmpty())
        <div class="container">
            @switch($type)
                @case('history')
                <h6>You have not attended any events!</h6>
                @break
                @case('ongoing')
                <h6>You have not applied for any events!</h6>
                @break
                @case('accepted')
                <h6>You don't have any accepted events!</h6>
                @break
                @case('rejected')
                <h6>You don't have any rejected events!</h6>
                @break
                @case('favorite')
                <h6>You don't have favorite events!</h6>
                @break

            @endswitch
        </div>
    @endif

        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-6">
                    <div class="single_event">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <figure>
                                    <img class="img-fluid w-100" src="img/event/{{$event->image}}" alt="">
                                    <div class="img-overlay"></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content_wrapper">
                                    <h3 class="title">
                                        <a href="{{route('events.show',$event)}}">{{$event->title}}</a>
                                    </h3>
                                    <p>{{$event->description}}</p>
                                    <div class="d-flex count_time" id="clockdiv1">
                                        <div class="mr-25">
                                            <h4 class="days">552</h4>
                                            <p>Days</p>
                                        </div>
                                        <div class="mr-25">
                                            <h4 class="hours">08</h4>
                                            <p>Hours</p>
                                        </div>
                                        <div class="mr-25">
                                            <h4 class="minutes">45</h4>
                                            <p>Minutes</p>
                                        </div>
                                    </div>
                                    <a href="{{route('events.show',$event)}}" class="primary_btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{--<div class="col-lg-6">--}}
                {{--<div class="single_event">--}}
                    {{--<div class="row align-items-center">--}}
                        {{--<div class="col-lg-6 col-md-6">--}}
                            {{--<figure>--}}
                                {{--<img class="img-fluid w-100" src="img/event/e2.jpg" alt="">--}}
                                {{--<div class="img-overlay"></div>--}}
                            {{--</figure>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6 col-md-6">--}}
                            {{--<div class="content_wrapper">--}}
                                {{--<h3 class="title">--}}
                                    {{--<a href="event-details.html">Help and homelesness</a>--}}
                                {{--</h3>--}}
                                {{--<p>--}}
                                    {{--Be tree their face won't appear day to waters moved fourth in they're divide don't a you're were man.--}}
                                {{--</p>--}}
                                {{--<div class="d-flex count_time" id="clockdiv2">--}}
                                    {{--<div class="mr-25">--}}
                                        {{--<h4 class="days">552</h4>--}}
                                        {{--<p>Days</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="mr-25">--}}
                                        {{--<h4 class="hours">08</h4>--}}
                                        {{--<p>Hours</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="mr-25">--}}
                                        {{--<h4 class="minutes">45</h4>--}}
                                        {{--<p>Minutes</p>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<h4 class="seconds">30</h4>--}}
                                        {{--<p>Seconds</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a href="#" class="primary_btn">Learn More</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
</section>