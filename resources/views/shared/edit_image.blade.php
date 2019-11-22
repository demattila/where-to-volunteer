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
                <h2>Edit profile image</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        @include('layouts.errors')
        @if (session()->has('message'))
            <div class="alert alert-success">
                <ul>
                        <li>{{session()->get('message')}}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <img class="rounded" style="width: 20rem;" src="{{$image}}" alt="user image">
            </div>
            <div class="col-md-6">
                <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="submit" value="Upload Image" class="btn btn-primary m-2">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label m-2" for="inputGroupFile01" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                    </div>
                </form>
                @if($user->getMedia('volunteer_profile_images')->first() != null)
                    <form action="{{route('image.destroy',$user->getMedia('volunteer_profile_images')->first())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2" type="submit" >Delete Image</button>
                    </form>
                @endif
            </div>
            <div class="col-md-2">
                <a class="btn btn-danger m-2" href="{{ route('dashboard') }}" >Go Back</a>
            </div>
        </div>

    </div>
</section>

@include('layouts.footer_bottom')

@include('layouts.scripts')
</body>
</html>
