<section class="event_area section-top-border">
    @if($events->isEmpty())
        <div class="container">
            @switch($type)
                @case('history')
                <h6>You have not attended any events!</h6>
                @break
                @case('all')
                <h6>You don't have any events!</h6>
                @break
            @endswitch
        </div>
    @endif

    <div class="row">
        @foreach($events as $event)
            <div class="col-lg-6">
                <div class="single_event">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-6">
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
                                <p style="max-height: 5rem;overflow: hidden">{{$event->description}}</p>

                                <div class="row align-bottom">
                                    <a href="{{route('events.show',$event)}}" class="primary_btn">See More</a>
                                    {{--<a href="{{route('event.image.edit',$event)}}" class="primary_btn">Edit</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <a href="{{route('event.image.edit',$event)}}" class="genric-btn info medium m-2">Change image</a>
                        <a href="{{route('event.image.edit',$event)}}" class="genric-btn info medium m-2">Edit</a>
                        <form action="{{route('events.destroy',$event)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button class="genric-btn danger medium m-2" type="submit" >Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</section>