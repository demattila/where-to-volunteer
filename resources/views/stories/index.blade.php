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
                                    <li><a href="{{route('stories.show',$story)}}">{{$story->views_count}} @lang('Views')<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="{{route('stories.show',$story)}}">{{$story->comments_count}} @lang('Comments')<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                                @if($volunteerSignedIn or $organizationSignedIn)
                                    @if($user->id == $story->owner_id and $user_type == $story->owner_type )
                                    <ul>
                                        <div class="dropdown">
                                            <button class="genric-btn primary small dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @lang('Edit post')
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
                                    <a href="{{route('stories.show',$story)}}"><h2>{{$story->title}}</h2></a>
                                    <p>{{$story->text_short}}</p>
                                    <a href="{{route('stories.show',$story)}}" class="blog_btn">@lang('View More')</a>
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
                            <input name="q" type="text" class="form-control" placeholder="@lang('Search Posts')">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                            </div>
                    </aside>
                    </form>

                        <div class="br"></div>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">@lang('Popular Posts')</h3>
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