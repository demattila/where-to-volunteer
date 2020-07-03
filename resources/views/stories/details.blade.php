<!doctype html>
<html lang="en">
<head>
    <title>Story</title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{asset('css/popular-thumb.css')}}">
    <link rel="stylesheet" href="{{asset('css/limit-chars.css')}}">

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
                <h2>Story Details</h2>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list">
                                <li><a href="#">{{$story->owner->name}}<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#">{{$story->created_at}}<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">{{$story->views()->count()}} Views<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="#">{{$story->comments()->count()}} Comments<i class="lnr lnr-bubble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <img class="img-fluid mb-3" src="{{$story->image_url}}">
                        <h2>{{$story->title}}</h2>
                        <p class="excert">
                            {{$story->text}}
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <div class="quotes">
                            {{$story->quote}}
                        </div>
                        <div class="row">
                            @foreach($story->getMedia('story_additional_images') as $image)
                                <div class="col-6">
                                    <img class="img-fluid" src="{{$image->getUrl()}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="navigation-area">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            @if(null !== $story->previous())

                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="{{route('stories.show',$story->previous())}}"><h4>{{$story->previous()->title}}</h4></a>
                            </div>
                            @endif
                        </div>



                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            @if(null !== $story->next())
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="{{route('stories.show',$story->next())}}"><h4>{{$story->next()->title}}</h4></a>

                            </div>

                            @endif
                        </div>

                    </div>
                </div>
                <div class="comments-area">
                    <h4>{{$story->comments()->count()}} Comments</h4>
                    @foreach($story->comments as $comment)
                    <div class="comment-list">
                        <div id="comment-{{$comment->id}}">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{$comment->owner->avatar_url}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{$comment->owner->name}}</a></h5>
                                        <p  class="date">{{$comment->created_at}} </p>
                                        <p class="comment">
                                            {{$comment->text}}
                                        </p>
                                    </div>
                                </div>
                                @if($user == $comment->owner)
                                <div class="reply-btn">
                                    <a class="btn-reply text-uppercase" onclick="deleteComment({{$comment->id}})"><i class="fas fa-backspace"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form method="POST" action="{{ route('comments.store',['story' => $story])}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="text" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required="true"></textarea>
                        </div>
                        {{--<input type="hidden" name="story_id" value="{{$story->id}}" />--}}
                        <button type="submit" class="primary-btn primary_btn">Post Comment</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>

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

                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->


@include('layouts.footer')
@include('layouts.scripts')

<script>
    function deleteComment(commentid) {
        var comment_id = commentid;
        $.ajax({
            type: 'DELETE',
            url: '/comment/' + comment_id,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function () {
                $('#comment-'+comment_id).hide();
            }
        });
    }
</script>
</body>
</html>