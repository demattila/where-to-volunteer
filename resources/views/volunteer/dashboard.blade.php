<!doctype html>
<html lang="en">
<head>
    <title>Dashboard</title>
    @include('layouts.head')
</head>
<body onload="scroll()">
@include('layouts.header', ['user' =>$user])

<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Volunteer dashboard</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->
<section class="section-content">
    <div class="section-top-border">
        <div class="container">
            <div class="row border border-light rounded" style="background-color: #f5f5f5">
                <div class="col-md-3 mr-2" style="padding: 10px">
                    <div class="panel panel-default" >
                        <div class="row m-2">
                            <h5 class="mr-2">Profile</h5>
                            <div class="dropdown">
                                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('profile.edit')}}">Edit profile data</a>
                                    <a class="dropdown-item" href="#">Change password</a>
                                    <a class="dropdown-item" href="{{route('image.edit')}}">Edit profile image</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel-body" align="middle">
                            <img class="rounded" style="width: 10rem;" src="{{$user->image_url}}" alt="user image">
                            <div class="col-lg-12">
                                <h6 class=" mt-3">{{$user->name}}</h6>
                                <p>{{$user->email}}</p>
                                <p class="card-text"><i>{{$user->posy}}</i></p>
                                {{--<a href="#" class="genric-btn info medium">Edit</a>--}}
                                {{--<div class="row justify-content-center">--}}
                                    {{--<div class="dropdown">--}}
                                        {{--<a class="genric-btn info medium mr-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--Edit--}}
                                        {{--</a>--}}
                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                                            {{--<a class="dropdown-item" href="{{route('profile.edit')}}">Edit profile data</a>--}}
                                            {{--<a class="dropdown-item" href="#">Change password</a>--}}
                                            {{--<a class="dropdown-item" href="{{route('image.edit')}}">Edit profile image</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<a href="#" class="genric-btn danger medium" onclick="event.preventDefault();--}}
                               {{--document.getElementById('logout-form').submit();">{{ __('Logout') }}--}}{{--<span class="lnr lnr-arrow-right"></span>--}}{{--</a>--}}
                                {{--</div>--}}
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mr-2" style="padding: 10px">
                    <div class="panel panel-default">
                        <div class="row m-2" align="left"><h5>Data</h5></div><hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4" align="middle" >
                                    <p><i class="fas fa-address-card fa-2x"></i></p>
                                </div>

                                <div class="col-md-6">
                                    <p>{{$user->city}}, {{$user->region}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" align="middle" >
                                    <p>
                                        @if($user->sex === 'M')
                                            <i class="fas fa-mars"></i>
                                        @elseif($user->sex === 'F')
                                            <i class="fas fa-venus fa-2x"></i>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        @if($user->sex === 'M')
                                            Male
                                        @elseif($user->sex === 'F')
                                            Female
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" align="middle" >
                                    <p><i class="fas fa-mobile-alt fa-2x"></i></p>
                                </div>

                                <div class="col-md-6">
                                    <p>{{$user->mobile}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" align="middle" >
                                    <p><i class="fas fa-briefcase fa-2x"></i></p>
                                </div>

                                <div class="col-md-6">
                                    <p>{{$user->works_at}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md" style="padding: 10px">
                    <div class="panel panel-default">
                        <div class="row m-2" align="left"><h5>Notifications</h5></div><hr>
                        <div class="panel-body">

                        </div>
                    </div>
                    .col-md-4
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">
                    <i class="fas fa-history fa-2x"></i> Volunteering History
                </a>
            </li>
            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link show active " id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">
                    <i class="far fa-calendar-alt fa-2x"></i> Ongoing Events
                </a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="genric-btn primary medium mr-1 nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">Accepted</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="genric-btn primary medium mr-1 nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link" id="favorites-tab" data-toggle="tab" href="#favorites" role="tab" aria-controls="favorites" aria-selected="false">
                    <i class="far fa-star fa-2x"></i> Saved Events
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                @include('event.show_component',['events' => $user->historyEvents(), 'type' => 'history'])
            </div>

            <div class="tab-pane fade show active" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
              {{--new tabs appear--}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link show active" style="color: #091b27" id="ongoing-tab"  data-toggle="tab" href="#ongoing-events" role="tab" aria-controls="ongoing-events" aria-selected="true">
                            In progress
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #091b27" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">
                            Accepted
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #091b27" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">
                            Rejected
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ongoing-events" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container">
                        @include('event.show_component',['events' => $user->ongoingApplies(),'type' => 'ongoing'])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="profile-tab">
                        @include('event.show_component',['events' => $user->acceptedApplies(),'type' => 'accepted'])
                    </div>
                    <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="contact-tab">
                        @include('event.show_component',['events' => $user->rejectedApplies(),'type' => 'rejected'])
                    </div>
                </div>
            </div>

            {{--<div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">--}}
                {{--@include('event.show_component',['events' => Auth::user()->acceptedApplies(),'type' => 'accepted'])--}}
            {{--</div>--}}
            {{--<div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">--}}
                {{--@include('event.show_component',['events' => Auth::user()->rejectedApplies(),'type' => 'rejected'])--}}
            {{--</div>--}}
            <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                @include('event.show_component',['events' => Auth::user()->favorites()->get(),'type' => 'favorite'])
            </div>

        </div>
    </div>
</section>


<!--================ Start footer Area  =================-->
{{--@include('layouts.footer')--}}
@include('layouts.footer_bottom')
<!--================ End footer Area  =================-->
<script>
    function scroll() {
        window.scrollTo(0,450);
    }
</script>
@include('layouts.scripts')
</body>
</html>