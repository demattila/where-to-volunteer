<!doctype html>
<html lang="en">
<head>
    <title>Events</title>
    @include('layouts.head')
</head>

<body>

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
            @include('event.filter',[
                'regions' => $regions,
                'categories' =>$categories,
                ])

        </div>
        <div class="row">
            {{--@foreach($events as $event)--}}
                {{--<div class="col-lg-4 col-md-6">--}}
                    {{--<div class="card">--}}
                        {{--<div class="card-body">--}}
                            {{--<figure>--}}
                                {{--<img class="card-img-top img-fluid" src="img/event/{{$event->image}}" alt="Card image cap">--}}
                            {{--</figure>--}}
                            {{--<div class="card_inner_body">--}}
                                {{--<h4 class="card-title">{{$event->title}}</h4>--}}
                                {{--<p class="card-text">--}}
                                    {{--{{$event->description}}--}}
                                {{--</p>--}}
                                {{--<div class="d-flex justify-content-between donation align-items-center">--}}
                                    {{--<a href="{{route('events.show',$event)}}" class="primary_btn">Learn More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
            @foreach($events as $event)
                <div class="col-lg-6" >
                    <div class="single_event">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <figure>
                                    <img class="img-fluid w-100" src="/img/event/{{$event->image}}" alt="">
                                    <div class="img-overlay"></div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content_wrapper">
                                    <h3 class="title">
                                        <a href="{{route('events.show',$event)}}">{{$event->title}}</a>
                                        @if(auth()->guard('web')->check())
                                            @if( auth()->user()->isFavorite($event) )
                                                <button type="button" class="btn" onclick="event.preventDefault();
                                                    document.getElementById('unfavorite-form-{{$event->id}}').submit();">
                                                    <span class="fas fa-star"></span>
                                                </button>
                                                <form id="unfavorite-form-{{$event->id}}" action="{{route('events.unfavorite', $event)}}" method="POST" style="display: none;">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            @else
                                                <button type="button" class="btn" onclick="event.preventDefault();
                                                        document.getElementById('favorite-form-{{$event->id}}').submit();">
                                                    <span class="far fa-star"></span>
                                                </button>
                                                {{--{{dump(route('events.favorite', $event))}}--}}
                                                {{--{{dump(route('events.unfavorite', $event))}}--}}
                                                <form id="favorite-form-{{$event->id}}" action="{{route('events.favorite', $event)}}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endif
                                        @endif
                                    </h3>
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
        {{--<nav aria-label="Page navigation example">--}}
            {{--<ul class="pagination">--}}
                {{--<li class="page-item "><a class="page-link" href="#">Previous</a></li>--}}
                {{--<li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}

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
</body>
</html>