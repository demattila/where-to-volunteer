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
                <h2>Edit story image</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        @include('layouts.errors')
        @include('layouts.message')
        <h3 class="mb-5">Head image</h3>
        <div class="row">

            <div class="col-md-4">
                <img class="rounded" style="width: 20rem;" src="{{$story->image_url}}" alt="user image">
            </div>
            <div class="col-md-6">
                <form action="{{route('story.image.store',['story' => $story])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary m-2">Upload</button>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label m-2" for="inputGroupFile01" aria-describedby="inputGroupFileAddon02">Choose image</label>
                        </div>
                    </div>
                </form>
                {{--{{dump($story->getMedia('story_image'))}}--}}
                @if($story->getMedia('story_image')->first() != null)
                    <form action="{{route('story.image.destroy',$story->getMedia('story_image')->first())}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2" type="submit" >Delete</button>
                    </form>
                @endif
            </div>
            <div class="col-md-2">
                <a class="btn btn-danger m-2" href="{{ route('stories.index') }}">
                    Back
                </a>
            </div>
        </div>
        <h3 class="mb-5">Additional images</h3>
        <div class="row">

            <div class="col-md-4">
                @foreach($story->getMedia('story_additional_images') as $image)
                <img class="rounded mb-2" style="width: 20rem;" src="{{$image->getUrl()}}" alt="user image">
                @endforeach
            </div>
            <div class="col-md-6">
                <form action="{{route('story.additionalImages.store',['story' => $story])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary m-2">Upload</button>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label m-2" for="inputGroupFile01" aria-describedby="inputGroupFileAddon02">Choose image</label>
                        </div>
                    </div>
                </form>
                {{--{{dump($story->getMedia('story_image'))}}--}}
                @if(! $story->getMedia('story_additional_images')->isEmpty())
                    <form action="{{route('story.additionalImages.destroy',$story)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2" type="submit" >Delete</button>
                    </form>
                @endif
            </div>
            <div class="col-md-2">
                <a class="btn btn-danger m-2" href="{{ route('stories.index') }}">
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
