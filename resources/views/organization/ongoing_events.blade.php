<section class="event_area section-top-border">
    @if($events->isEmpty())
        <div class="container">
            <h6>You don't have any ongoing events!</h6>
        </div>
    @endif

    <div class="row">
        @foreach($events as $event)
            <div class="col-lg-6">
                <div class="event-header">
                    <div class="row" style="float: right">
                        <a href="{{route('event.image.edit',$event)}}" title="Change image" class="mr-1 text-dark" style="padding: 6px" ><i class="fas fa-images"></i></a>
                        <a href="{{route('events.edit',$event)}}" title="Edit" class="mr-1" style="padding: 6px"><i class="fas fa-edit text-dark"></i></a>
                        <a href="#"  title="Delete" onclick="showEventDeleteModal3({{$event->id}});" class="mr-3 text-dark" style="padding: 6px"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                {{--ongoing_event--}}
                <div class="single_event cellsmoke ">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            {{--<div class="content_wrapper">--}}
                            {{--<h4 class="title">--}}
                            {{--<a href="{{route('events.show',$event)}}">{{$event->title}}</a>--}}
                            {{--</h4>--}}
                            {{--</div>--}}
                            <figure>
                                <img class="img-fluid w-100" src="{{$event->image_url}}" alt="">
                                <div class="img-overlay"></div>
                            </figure>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="content_wrapper">
                                <h3 class="title">
                                    <a href="{{route('events.show',$event)}}">{{$event->title}}</a>
                                </h3>
                                <h6>{{$event->starts_at->format('d.m.Y')}} - {{$event->ends_at->format('d.m.Y')}}</h6>
                                <p>{{$event->address}}</p>
                                <p>{{$event->city}}</p>

                                <a href="{{route('events.ongoing_show',$event)}}" class="genric-btn primary medium m-1">Manage</a>
                                    {{--<a href="{{route('event.image.edit',$event)}}" class="primary_btn">Edit</a>--}}
                            </div>
                        </div>
                    </div>
                    {{--<div class="row">--}}
                        {{--<a href="{{route('event.image.edit',$event)}}" class="genric-btn info medium m-2">Change image</a>--}}
                        {{--<a href="{{route('events.edit',$event)}}" class="genric-btn info medium m-2">Edit</a>--}}
                        {{--<form action="{{route('events.destroy',$event)}}" method="post" enctype="multipart/form-data">--}}
                            {{--@csrf--}}
                            {{--@method('DELETE')--}}
                            {{--<button class="genric-btn danger medium m-2" type="submit" >Delete</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}

                </div>
            </div>
            <div id="deleteModal3-{{$event->id}}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Are you sure ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Clicking on delete button will permanently delete your events.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                    onclick="event.preventDefault();
                                            document.getElementById('delete-event-form3-{{$event->id}}').submit();">
                                Delete
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <form id="delete-event-form3-{{$event->id}}" action="{{route('events.postDelete',$event)}}" method="post" enctype="multipart/form-data" style="display: none;">
                    @csrf
                </form>
            </div>
        @endforeach
    </div>
</section>

<script>
    function showEventDeleteModal3(id){
        var currentModal = 'deleteModal3-' + id;
        $('#' + currentModal).modal({
            backdrop: 'static',
            keyboard: false
        });
    }
</script>