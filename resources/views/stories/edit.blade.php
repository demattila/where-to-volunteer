<!doctype html>
<html lang="en">
<head>
    <title>Edit story</title>
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

 <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Edit story</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h5 class="card-header">{{ __('Edit story') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('stories.update',['story' => $story]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}*</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $story->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text_short" class="col-md-3 col-form-label text-md-right">{{ __('Short Text') }}</label>

                                <div class="col-md-9">
                                    <input id="text_short" type="text" class="form-control @error('text_short') is-invalid @enderror" name="text_short" value="{{ $story->text_short }}" autocomplete="text_short">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Text') }}</label>
                                <div class="col-md-9 mt-10">
                                    <textarea rows="20"  id="text" name="text" class="form-control @error('text') is-invalid @enderror"  placeholder="Tell your story" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tell your story'">{{$story->text}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quote" class="col-md-3 col-form-label text-md-right">{{ __('Quote above images') }}</label>

                                <div class="col-md-9">
                                    <input id="quote" type="text" class="form-control @error('quote') is-invalid @enderror" name="quote" value="{{ $story->quote }}" autocomplete="quote">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 offset-md-4 mt-5">
                                    <button type="submit" class="genric-btn primary">
                                        {{ __('Update Story') }}
                                    </button>
                                    <a href= "{{ route('stories.index') }}" class="genric-btn danger mr-3 ">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('layouts.errors')
                </div>
            </div>

        </div>
    </div>

</section>

@include('layouts.footer')
@include('layouts.scripts')
</body>
</html>