<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
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
                <h2>Volunteer dashboard</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ End Story Area =================-->
<div class="section-top-border">
    <div class="container">
        <div class="row border border-light rounded" style="background-color: #ffffed">
            <div class="col-md-3"  style="padding: 10px">
                <div class="panel panel-default" >
                    <div class="panel-heading" align="left">
                        <h5>Account</h5><hr>
                    </div>
                    <div class="panel-body" align="middle">
                        <img class="rounded" style="width: 10rem;" src="{{$user->image_url}}" alt="user image">
                        <div class="col-lg-12">
                            <h6 class=" mt-3">{{$user->name}}</h6>
                            <p>{{$user->email}}</p>
                            <p class="card-text"><i>{{$user->posy}}</i></p>
                            {{--<a href="#" class="genric-btn info medium">Edit</a>--}}
                            <div class="row justify-content-center">
                                <div class="dropdown">
                                    <a class="genric-btn info medium mr-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Edit
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('profile.edit')}}">Edit profile data</a>
                                        <a class="dropdown-item" href="#">Change password</a>
                                        <a class="dropdown-item" href="{{route('image.edit')}}">Edit profile image</a>
                                    </div>
                                </div>
                                <a href="#" class="genric-btn danger medium" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">{{ __('Logout') }}{{--<span class="lnr lnr-arrow-right"></span>--}}</a>
                            </div>
                            </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="padding: 10px">
                <div class="panel panel-default">
                    <div class="panel-heading" align="left"><h5>Profile</h5><hr></div>
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
                                            <i class="fas fa-mars fa-2x"></i>
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
            <div class="col-md-4" style="padding: 10px">
                <div class="panel panel-default">
                    <div class="panel-heading" align="left"><h5>Something</h5><hr></div>
                    <div class="panel-body">

                    </div>
                </div>
                .col-md-4
            </div>
        </div>
    </div>
</div>


<section class="section">
    <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="genric-btn primary medium mr-1 nav-link active" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">History</a>
        </li>
        <li class="nav-item">
            <a class="genric-btn primary medium mr-1 nav-link " id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">Ongoing</a>
        </li>
        <li class="nav-item">
            <a class="genric-btn primary medium mr-1 nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">Accepted</a>
        </li>
        <li class="nav-item">
            <a class="genric-btn primary medium mr-1 nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>
        </li>
        <li class="nav-item">
            <a class="genric-btn primary medium mr-1 nav-link" id="favorites-tab" data-toggle="tab" href="#favorites" role="tab" aria-controls="favorites" aria-selected="false">Favorites</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab">
            @include('event.show_component',['events' => Auth::user()->historyEvents(), 'type' => 'history'])
        </div>
        <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
            @include('event.show_component',['events' => Auth::user()->ongoingApplies(),'type' => 'ongoing'])
        </div>
        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
            @include('event.show_component',['events' => Auth::user()->acceptedApplies(),'type' => 'accepted'])
        </div>
        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
            @include('event.show_component',['events' => Auth::user()->rejectedApplies(),'type' => 'rejected'])
        </div>
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

@include('layouts.scripts')
</body>
</html>