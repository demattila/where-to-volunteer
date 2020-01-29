<!doctype html>
<html lang="en">
<head>
    <title>Stories</title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{asset('css/popular-thumb.css')}}">
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
                <h2>Our Stories</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================Blog Area =================-->
<section style="padding-top: 50px" class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    @include('layouts.message')
                    @if($stories)
                    @foreach($stories as $story)

                    <article class="row blog_item">
                        <div class="col-md-3">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li><a href="{{route('stories.show',$story)}}">{{$story->owner->name}}<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="{{route('stories.show',$story)}}">{{$story->created_at->format('d-m-Y')}}<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="{{route('stories.show',$story)}}">{{$story->views_count}} Views<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="{{route('stories.show',$story)}}">{{$story->comments_count}} Comments<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                                {{--{{dump($user)}}--}}
                                {{--{{dump($story->owner)}}--}}
                                {{--{{dump($user == $story->owner)}}--}}
                                @if($volunteerSignedIn or $organizationSignedIn)
                                    @if($user->id == $story->owner_id and $user_type == $story->owner_type )
                                    <ul>
                                        <div class="dropdown">
                                            <button class="genric-btn primary small dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Edit post
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('story.image.edit',$story)}}">Image</a>
                                                <a class="dropdown-item" href="{{route('stories.edit',$story)}}">Content</a>
                                            </div>
                                        </div>
                                    </ul>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="blog_post">
                                <img src="{{$story->image_url}}" alt="">
                                <div class="blog_details">
                                    <a href="single-blog.html"><h2>{{$story->title}}</h2></a>
                                    <p>{{$story->text_short}}</p>
                                    <a href="{{route('stories.show',$story)}}" class="blog_btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    @endforeach
                    {{$stories->links()}}
                    @endif


                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <form method="get" action="{{ route('stories.index') }}" >
                    <aside class="single_sidebar_widget search_widget">
                            @csrf
                            <div class="input-group">
                            <input name="q" type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                            </div>
                    </aside>
                    </form>

                        <div class="br"></div>
                    {{--<aside class="single_sidebar_widget author_widget">--}}
                        {{--<img class="author_img rounded-circle" src="img/blog/author.png" alt="">--}}
                        {{--<h4>Charlie Barber</h4>--}}
                        {{--<p>Senior blog writer</p>--}}
                        {{--<div class="social_icon">--}}
                            {{--<a href="#"><i class="fab fa-facebook-square"></i></a>--}}
                            {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                            {{--<a href="#"><i class="fa fa-github"></i></a>--}}
                            {{--<a href="#"><i class="fa fa-behance"></i></a>--}}
                        {{--</div>--}}
                        {{--<p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>--}}
                        {{--<div class="br"></div>--}}
                    {{--</aside>--}}
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach($popularStories as $story)
                            <div class="media post_item">
                                <img src="{{$story->image_url}}" class="popular-thumb" alt="post">
                                <div class="media-body">
                                    <a href="{{route('stories.show',$story)}}" ><h3 class="twenty-chars">{{$story->title}}</h3></a>
                                    <p>{{$story->created_at}}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        <div class="br"></div>
                    </aside>

                    <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <p>
                            Here, I focus on a range of items and features that we use in life without
                            giving them a second thought.
                        </p>
                        <div class="form-group d-flex flex-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                            </div>
                            <a href="#" class="bbtns">Subcribe</a>
                        </div>
                        <p class="text-bottom">You can unsubscribe at any time</p>
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')
</body>
</html>