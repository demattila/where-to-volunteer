<html>
<head>
    <title>Edit profile</title>
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

 <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Edit</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

{{--<section class="home_banner_area">--}}
    {{--<div class="banner_inner">--}}
        {{--<div class="container">--}}
            {{--<div class="banner_content">--}}
                {{--<p class="upper_text">Give a hand</p>--}}
                {{--<h2>to make the better world</h2>--}}
                {{--<p>--}}
                    {{--That don't lights. Blessed land spirit creature divide our made two--}}
                    {{--itself upon you'll dominion waters man second good you they're divided upon winged were replenish night--}}
                {{--</p>--}}
                {{--<a class="primary_btn yellow_btn text-white"  href={{route('register')}}>Register</a>--}}
                {{--<a class="primary_btn mr-20" href={{route('login')}}>Log in<span class="lnr lnr-arrow-right"></span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

<section class="section-top-border">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Edit profile') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="posy" class="col-md-4 col-form-label text-md-right">{{ __('Motto') }}</label>

                                <div class="col-md-6">
                                    <input id="posy" type="text" class="form-control @error('name') is-invalid @enderror" name="posy" value="{{ $user->posy }}" autocomplete="posy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control @error('name') is-invalid @enderror" name="mobile" value="{{ $user->mobile }}" autocomplete="mobile">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City*') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value="{{ $user->city }}" autocomplete="city">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region*') }}</label>

                                <div class="col-md-6">
                                    <input id="region" type="text" class="form-control @error('name') is-invalid @enderror" name="region" value="{{ $user->region }}" autocomplete="region">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="works_at" class="col-md-4 col-form-label text-md-right">{{ __('Workplace') }}</label>

                                <div class="col-md-6">
                                    <input id="works_at" type="text" class="form-control @error('name') is-invalid @enderror" name="works_at" value="{{ $user->works_at }}" autocomplete="works_at">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birthday*') }}</label>

                                <div class="col-md-6">
                                    <input id="birth" type="date" class="form-control @error('name') is-invalid @enderror" name="birth" value="{{ $user->birth}}" autocomplete="birth">
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                            {{--<label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="image" type="file" class="form-control @error('name') is-invalid @enderror" name="image" accept="image/*">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <label for="sex1" class="col-md-4 col-form-label text-md-right">{{ __('Gender*') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="radio" name="sex" id="sex1" value="M" @if($user->sex == 'M') checked @endif>
                                        <label class="form-check-label" for="sex1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="sex2" value="F" @if($user->sex == 'F') checked @endif>
                                        <label class="form-check-label" for="sex2">
                                            Female
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="driving_licence" class="col-md-4 col-form-label text-md-right">{{ __('Driving Licence') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="radio" name="driving_licence" id="driving_licence1" value="true" @if($user->driving_licence == 1) checked @endif>
                                        <label class="form-check-label" for="driving_licence1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="driving_licence" id="driving_licence2" value="false" @if($user->driving_licence == 0) checked @endif>
                                        <label class="form-check-label" for="driving_licence2">
                                            No
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="genric-btn primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                    <a href= "{{ route('dashboard') }}" class="genric-btn danger mr-3 ">Go Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('layouts.errors')
                </div>
            </div>
            {{--<div class="col-md-4">--}}

            {{--</div>--}}
        </div>
    </div>

</section>

@include('layouts.footer')
@include('layouts.scripts')
</body>
</html>