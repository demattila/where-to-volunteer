<!doctype html>
<html lang="en">
<head>
    <title>Event details</title>
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
                        <li><h6>{{$event->starts_at->format('d.m.Y')}} - {{$event->ends_at->format('d.m.Y')}}</h6></li>
                        <li><h6>{{$event->address}}</h6></li>
                        <li><h6>{{$event->city}}, {{$event->region}}</h6></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Recent Event Area =================-->

<section>
    <div class="container">
        <h4 style="margin-bottom: 2rem">Manage subscribed volunteers:</h4>

        <table style="width:100%">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach($event->applies as $volunteer)
                <tr>
                    <td>{{$volunteer->name}}</td>
                    <td>{{$volunteer ->email}}</td>
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
                                    <button class="genric-btn info small m-2 ml-4" type="submit" >Accept</button>
                                </form>
                                <form action="{{ route('apply.reject',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button class="genric-btn danger small m-2" type="submit" >Reject</button>
                                </form>
                            </div>
                            @break
                            @case(1)
                            <div class="row">
                                <form action="{{ route('apply.reject',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button class="genric-btn danger small m-2" type="submit" >Reject</button>
                                </form>
                            </div>
                            @break
                            @case(2)
                            <div class="row">
                                <form action="{{ route('apply.accept',['event' => $event,'volunteer' => $volunteer]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button class="genric-btn info small m-2 ml-4" type="submit" >Accept</button>
                                </form>
                            </div>
                            @break
                        @endswitch
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
@include('layouts.footer')

@include('layouts.scripts')
@include('sweetalert::alert')
</body>
</html>