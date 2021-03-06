<!doctype html>
<html lang="en">
<head>
    <title>Dashboard</title>
    @include('layouts.head')
</head>
<body onload="scrolll()">
@include('layouts.header')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Organization dashboard</h2>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<div class="section-top-border">
    <div class="container">
        @include('layouts.message')
        {{--<div class="jumbotron"></div>--}}
        <div class="row border border-light rounded cellsmoke-dark">

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
                                    <a class="dropdown-item" href="{{route('image.edit')}}">Edit profile image</a>
                                    <a class="dropdown-item" style="cursor: pointer" onclick="showDeleteModal();">Delete profile</a>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="padding: 10px">
                <div class="panel panel-default">
                    <div class="row m-2" align="left"><h5>Data</h5></div><hr>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4" align="middle" >
                                <p><i class="fas fa-map-marker fa-2x"></i></p>
                            </div>

                            <div class="col-md-6">
                                <p>{{$user->city}}, {{$user->region}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4" align="middle" >
                                <p><i class="fas fa-share-square fa-2x"></i></p>
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
                        <div>
                            <a href="{{route('events.create')}}" class="genric-btn circle warning text-black-50 mb-2" style="width:12rem"><i class="fas fa-plus"></i> New event</a>
                        </div>
                       <div>
                           <a href="{{route('stories.create')}}" class="genric-btn circle warning text-black-50 mb-2" style="width:12rem"><i class="fas fa-plus"></i> Write a story</a>
                       </div>
                        <div>
                            <a id="sendMessageButton" href="#" class="genric-btn circle warning text-black-50" style="width:12rem"><i class="fas fa-plus"></i> Send message</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="messageSendBox" style="display: none">
    @include('organization.message_send')
</section>


<section class="section">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link " id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">
                    <i class="fas fa-history fa-2x mr-2"></i> Expired Events
                </a>
            </li>

            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">
                    <i class="fas fa-align-justify fa-2x mr-2"></i>All Events
                </a>
            </li>

            <li class="nav-item">
                <a class="genric-btn primary medium mr-1 nav-link show active" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">
                    <i class="fas fa-tasks fa-2x mr-2"></i> Upcoming Events
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
                    @include('organization.my_events_all',['events' => $user->events()->get(),'type' => 'all'])
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

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Clicking on delete button will permanently delete your account.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                        onclick="event.preventDefault();
                                document.getElementById('delete-profile-form').submit();">
                    Delete
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <form id="delete-profile-form" action="{{ route('organization.profile.delete') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

@include('layouts.footer')

@include('layouts.scripts')
<script>
    function showDeleteModal(){
        $('#deleteModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    }
    function showMessageBox(){
        $('#messageSendBox').show();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#messageSendBox").offset().top-60
        }, 1000);
    }
    $( "#sendMessageButton" ).click(function() {
        showMessageBox();
    });

    $(document).on("click","#myTab .nav-item",function(){
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#myTab").offset().top-100
        }, 1000);
    });

</script>

@if ($errors->count() > 0)
<script>
    showMessageBox();
</script>
@endif

</body>
</html>