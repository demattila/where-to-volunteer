<!doctype html>
<html lang="en">

<head>
    <title>Edit image</title>
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
                <h2>Edit event image</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        @include('layouts.errors')
        @include('layouts.message')
        @if (session()->has('isRedirected'))
            <h5>First step->Second step</h5>
        @endif
        <div class="row">
            <div class="col-md-4">
                <img class="rounded" style="width: 20rem;" src="{{$event->image_url}}" alt="user image">
            </div>
            <div class="col-md-6">
                <form action="{{route('event.image.store',['event' => $event])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (session()->has('isRedirected'))
                        <input type="hidden" name="isRedirected" value="1">
                    @endif
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary m-2">Upload</button>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label m-2" for="inputGroupFile01" aria-describedby="inputGroupFileAddon02">Choose image</label>
                        </div>
                    </div>
                </form>
                @if($event->getMedia('event_profile_images')->first() != null)
                    <form action="{{route('event.image.destroy',$event->getMedia('event_profile_images')->first())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2" type="submit" >Delete</button>
                    </form>
                @endif
            </div>
            <div class="col-md-2">
                <a class="btn btn-danger m-2" href="{{ route('organization.dashboard') }}">
                  Back
                </a>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

@include('layouts.scripts')
</body>
</html>
