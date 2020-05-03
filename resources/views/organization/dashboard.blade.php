<!doctype html>
<html lang="en">
<head>
    <title>Dashboard</title>
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Organization dashboard</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<div class="section-top-border">
    <div class="container">
        @include('layouts.message')
        {{--<div class="jumbotron"></div>--}}
        <div class="row border border-light rounded" style="background-color: #f5f5f5;box-shadow: 10px 10px 5px grey">

            <div class="col-md-3"  style="padding: 10px">
                <div class="panel panel-default" >
                    <div align="left">
                        <div class="row m-2">
                            <h5 class="mr-1">Profile</h5>
                            <div class="dropdown">
                                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('organization.profile.edit')}}">Edit profile data</a>
                                    <a class="dropdown-item" href="#">Change password</a>
                                    <a class="dropdown-item" href="{{route('image.edit')}}">Edit profile image</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body" align="middle">
                        <a href="{{route('image.edit')}}"><img src="{{$user->image_url}}" style="width: 10rem;"></a>
                        {{--<img class="rounded" style="width: 10rem;" src="{{$user->image_url}}" alt="user image">--}}
                        <div class="col-lg-12">
                            <h6 class=" mt-3">{{$user->name}} </h6>
                            <p>{{$user->email}}</p>
                            <p class="card-text"><i>{{$user->founded_at}}</i></p>
                            {{--<a href="#" class="genric-btn info medium">Edit</a>--}}
                            {{--<div class="row justify-content-center">--}}
                                {{--<div class="dropdown">--}}
                                    {{--<a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--<i class="fas fa-edit"></i>--}}
                                    {{--</a>--}}
                                    {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                                        {{--<a class="dropdown-item" href="{{route('organization.profile.edit')}}">Edit profile data</a>--}}
                                        {{--<a class="dropdown-item" href="#">Change password</a>--}}
                                        {{--<a class="dropdown-item" href="{{route('image.edit')}}">Edit profile image</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<a href="#" class="genric-btn danger medium" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>--}}
                            {{--</div>--}}
                        </div>
                        {{--<form id="logout-form" action="{{ route('organization.logout') }}" method="POST" style="display: none;">--}}
                            {{--@csrf--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="padding: 10px">
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
                                <p><i class="fas fa-address-card fa-2x"></i></p>
                            </div>

                            <div class="col-md-6">
                                <p>{{$user->site}}</p>
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

                    </div>
                </div>
            </div>

            <div class="col-md-4" style="padding: 10px">
                <div class="panel panel-default">
                    <div class="row m-2" align="left"><h5>Options</h5></div><hr>
                    <div class="panel-body">
                        <div class="row">
                            <a href="{{route('events.create')}}" class="genric-btn warning text-black-50 mb-2" style="width:12rem"><i class="fas fa-plus"></i> Create new event</a>
                        </div>
                       <div class="row">
                           <a href="{{route('stories.create')}}" class="genric-btn warning text-black-50" style="width:12rem"><i class="fas fa-plus"></i> Write a story</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="section">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link " id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">
                    <i class="fas fa-history fa-2x mr-2"></i> History Events
                </a>
            </li>

            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">All Events</a>
            </li>

            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link show active" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">
                    <i class="fas fa-tasks fa-2x mr-2"></i> Ongoing Events
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade " id="history" role="tabpanel" aria-labelledby="history-tab">
                <div class="container">
                    @include('organization.my_events',['events' => $user->historyEvents(), 'type' => 'history'])

                </div>
            </div>

            <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="container">
                    @include('organization.my_events',['events' => $user->events()->get(),'type' => 'all'])
                </div>
            </div>

            <div class="tab-pane fade show active" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                <div class="container">
                    @include('organization.ongoing_events',['events' => $user->ongoingEvents(),'type' => 'ongoing'])
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

@include('layouts.scripts')

{{--<script src="https://js.pusher.com/5.0/pusher.min.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
{{--<style>--}}
{{--/*.fixed-dialog {position: fixed;}*/--}}
{{--</style>--}}
{{--<script>--}}
    {{--// Enable pusher logging - don't include this in production--}}
    {{--Pusher.logToConsole = true;--}}

    {{--var pusher = new Pusher('8fa3cad6dcc20526ad09', {--}}
        {{--cluster: 'eu',--}}
        {{--forceTLS: true--}}
    {{--});--}}

    {{--var channel = pusher.subscribe('my-channel');--}}

    {{--// channel.bind('apply_response', function(data) {--}}
    {{--//     // alert(JSON.stringify(data));--}}
    {{--//     // alert(JSON.stringify(data));--}}
    {{--//     $("#myModal").modal();--}}
    {{--// });--}}
    {{--channel.bind('apply_request',notify);--}}

    {{--var heightCounter = 10;--}}
    {{--function notify(data) {--}}
        {{--var yourPosition = {--}}
            {{--my: "left bottom",--}}
            {{--at: "left+10 bottom-"+heightCounter--}}
        {{--};--}}
        {{--var elem = $('<div></div>');--}}
        {{--// elem.html();--}}
        {{--$('<a href="/organization/dashboard" style="font-size: 16px"></a>', {--}}
            {{--class : 'inner'--}}
        {{--}).html(data.message).appendTo( elem );--}}
        {{--elem.dialog({--}}
            {{--create: function(event) {--}}
                {{--$(event.target).parent().css('position', 'fixed');--}}
            {{--},--}}
            {{--dialogClass: "no-close noTitleStuff fixed-dialog",--}}
            {{--autoOpen: true,--}}
            {{--title: data.event,--}}
            {{--// modal: true,--}}
            {{--position:yourPosition,--}}
            {{--minWidth: 300,--}}
            {{--draggable:false,--}}
            {{--resizable: false,--}}
            {{--show : { effect: "fade", duration: 1000},--}}
            {{--hide: { effect: "fade", duration: 1000 },--}}
            {{--close: function() { heightCounter-=20; }--}}

        {{--});--}}
        {{--// .prev(".ui-dialog-titlebar").css("background","#7FFF00")--}}
        {{--heightCounter+=20;--}}
    {{--}--}}
{{--</script>--}}
</body>
</html>