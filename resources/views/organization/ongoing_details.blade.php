<!doctype html>
<html lang="en">
<head>
    <title>Event details</title>
    @include('layouts.head')
    <link rel="stylesheet" href="{{asset('css/limit-chars.css')}}">

</head>
<body>

@include('layouts.header')

<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Ongoing Event Details</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start Recent Event Area =================-->
<section class="condition-area event-details-area section_gap">
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="condition-left">
                    <img class="img-fluid" src="{{$event->image_url}}" alt="">
                </div>
            </div>
            <div class="offset-lg-1 col-lg-5">
                <div class="condition-right">
                    <h2 class="mb-20">
                        {{$event->title}}
                    </h2>
                    <p>
                        If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may
                        see some for as low as each. If you are looking at blank cassettes on the web, you may be very confused at the
                        difference in price You may see.
                    </p>
                    <p>
                       {{$event->description}}
                    </p>
                    <ul>
                        <li><b>{{$event->starts_at->format('d.m.Y')}} - {{$event->ends_at->format('d.m.Y')}}</b></li>
                        <li><b>{{$event->address}}</b></li>
                        <li><b>{{$event->city}}, {{$event->region}}</b></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Recent Event Area =================-->

<section>
    <div class="container">

        <h4 class="mb-4">Manage subscribed volunteers:</h4>
        <div class="row mb-4">
            <div class="col-md-2">
                <div class="card  text-center">
                    <div class="card-body">
                        <h6 class="card-title">Accepted</h6>
                        <p >{{$accepted_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card  text-center" >
                    <div class="card-body">
                        <h6 class="card-title">Rejected</h6>
                        <p >{{$rejected_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card  text-center" >
                    <div class="card-body">
                        <h6 class="card-title">Waiting</h6>
                        <p >{{$ongoing_count}}</p>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover" style="width:100%">
            <tr>
                <th>
                    Name
                    <a data-container="body" data-toggle="popover" data-placement="right" data-content="Click on name to get more info about volunteers!">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach($event->applies as $volunteer)
                <div class="modal fade" id="modalProfile{{$volunteer->id}}" tabindex="-1" role="dialog" aria-labelledby="modalProfileCenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="modalTitle">{{$volunteer->name}}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img-fluid" style="max-width: 15rem" src="{{$volunteer->image_url}}">
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Data</h6>
                                        @if($volunteer->sex == 'M')
                                            <p><i class="fas fa-mars"></i> <b>Male</b></p>
                                        @else
                                            <p><i class="fas fa-venus"></i> <b>Female</b></p>
                                        @endif
                                            <p><i class="fas fa-calendar-day"></i> <b>{{$volunteer->birth}}</b></p>
                                            <p><i class="fas fa-address-card"></i> <b>{{$volunteer->city}}, {{$volunteer->region}}</b></p>
                                        @if($volunteer->driving_licence)
                                        <p><i class="fas fa-car-side"></i> <b>Driving licence</b></p>
                                        @endif
                                        <p><i class="fas fa-briefcase"></i> <b>{{$volunteer->works_at}}</b></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Contact</h6>

                                        <p><b>{{$volunteer->mobile}}</b></p>
                                        <p><b>{{$volunteer->email}}</b></p>
                                    </div>
                                </div>
                                <p class="mt-2"><strong>Motto</strong></p>
                                <blockquote>{{$volunteer->posy}}</blockquote>
                                <div>
                                    <p class="mt-2"><strong>Events attended</strong></p>
                                    <div class="four-line-box">
                                    @foreach($volunteer->historyEvents() as $eventsAttended)
                                        <a class="mr-2" href="{{route('events.show',$eventsAttended)}}"> {{$eventsAttended->title}}</a>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <tr>
                    <td>
                        <a href="#"  data-toggle="modal" data-target="#modalProfile{{$volunteer->id}}">
                            <h6>{{$volunteer->name}}</h6>
                        </a>
                    </td>
                    <td>{{$volunteer->email}} </td>
                    <td>
                        @switch($volunteer->pivot->status)
                            @case(0) Waiting @break
                            @case(1) Accepted @break
                            @case(2) Rejected @break
                        @endswitch
                        {{--{{$volunteer->pivot->status}}--}}
                    </td>
                    <td>
                        @switch($volunteer->pivot->status)
                            @case(0)
                            <div class="row">
                                <form action="{{ route('apply.accept',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button class="mr-2" style="color:green" type="submit" ><i class="fas fa-user-check"></i></button>
                                </form>
                                <form action="{{ route('apply.reject',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button  type="submit" ><i class="fas fa-user-times"></i></button>
                                </form>
                            </div>
                            @break
                            @case(1)
                            <div class="row">
                                <form action="{{ route('apply.reject',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button style="color: red" type="submit" ><i class="fas fa-user-times"></i></button>
                                </form>
                            </div>
                            @break
                            @case(2)
                            <div class="row">
                                <form action="{{ route('apply.accept',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button style="color:green" type="submit" ><i class="fas fa-user-check"></i></button>
                                </form>
                            </div>
                            @break
                        @endswitch
                    </td>
                </tr>
            @endforeach

        </table>
        @if($event->applies->isEmpty())
            <p>Nobody applied to this event yet.</p>
        @endif
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
@include('sweetalert::alert')
</body>
</html>