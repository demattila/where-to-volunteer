<!doctype html>
<html lang="en">
<head>
    <title>Create Story</title>
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Create Story</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="event_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ __('New Story') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('stories.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}*</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_short" class="col-md-4 col-form-label text-md-right">{{ __('Short Text') }}</label>

                                <div class="col-md-6">
                                    <input id="text_short" type="text" class="form-control @error('text_short') is-invalid @enderror" name="text_short" value="{{ old('text_short') }}" autocomplete="text_short">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>
                                <div class="col-md-6 mt-10">
                                    <textarea rows="20"  id="text" name="text" class="form-control @error('text') is-invalid @enderror"  placeholder="Tell your story" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tell your story'"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quote" class="col-md-4 col-form-label text-md-right">{{ __('Quote above images') }}</label>

                                <div class="col-md-6">
                                    <input id="quote" type="text" class="form-control @error('quote') is-invalid @enderror" name="quote" value="{{ old('quote') }}" autocomplete="quote">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="genric-btn primary">
                                        {{ __('Post') }}
                                    </button>
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

{{--<script>--}}
    {{--function scroll() {--}}
        {{--window.scrollTo(0,450);--}}
    {{--}--}}
{{--</script>--}}
@include('layouts.scripts')

</body>
</html>