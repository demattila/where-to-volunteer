<section class="event_area section-top-border">
    @if($events->isEmpty())
        <div class="container">
            @switch($type)
                @case('ongoing')
                <h6>You have not applied for any events! <a href="{{route('events.index')}}">Find an event!</a></h6>
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
                                {{--<div class="content_wrapper">--}}
                                    {{--<h4 class="title">--}}
                                        {{--<a href="{{route('events.show',$event)}}">{{$event->title}}</a>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                                <figure>
                                    <img class="img-fluid w-100" src="{{$event->image_url}}" alt="">
                                    <div class="img-overlay"></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content_wrapper">
                                    <h3 class="title">
                                        <a href="{{route('events.show',$event)}}">{{$event->title}}</a>
                                    </h3>
                                    <p style="overflow: hidden; max-height: 5rem">{{$event->description}}</p>

                                        <a href="{{route('events.show',$event)}}" class="genric-btn primary">More</a>
                                        {{--<a href="{{route('event.image.edit',$event)}}" class="primary_btn">Edit</a>--}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>