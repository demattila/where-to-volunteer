<section class="event_area section-top-border">
    @if($user->favorites->isEmpty())
        <div class="container">
            <h6>You don't have any saved events!</h6>
        </div>
    @else
    <div class="row">
        @foreach($user->favorites as $event)

            <div class="col-lg-6" id="event-{{$event->id}}">
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
                                <h6>{{$event->starts_at->format('d.m.Y')}} - {{$event->ends_at->format('d.m.Y')}}</h6>
                                <p>{{$event->address}}</p>
                                <p>{{$event->city}}</p>
                                <button class="genric-btn danger medium m-2" onClick="deleteFromFavourites({{$event->id}})">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</section>

