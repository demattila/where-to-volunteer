{{--@extends('layouts.app')--}}
<html>
<head>
    <title>Register</title>
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Volunteer register</h2>
                <p>Platea nullam nostra laoreet potenti hendrerit laoreet enim nisl</p>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Register') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="posy" class="col-md-4 col-form-label text-md-right">{{ __('Motto') }}</label>

                                <div class="col-md-6">
                                    <input id="posy" type="text" class="form-control @error('name') is-invalid @enderror" name="posy"  autocomplete="posy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control @error('name') is-invalid @enderror" name="mobile"  autocomplete="mobile">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City*') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city"  autocomplete="city">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region*') }}</label>

                                <div class="col-md-6">
                                    <input id="region" type="text" class="form-control @error('name') is-invalid @enderror" name="region"  autocomplete="region">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="works_at" class="col-md-4 col-form-label text-md-right">{{ __('Workplace') }}</label>

                                <div class="col-md-6">
                                    <input id="works_at" type="text" class="form-control @error('name') is-invalid @enderror" name="works_at"  autocomplete="works_at">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birthday*') }}</label>

                                <div class="col-md-6">
                                    <input id="birth" type="date" class="form-control @error('name') is-invalid @enderror" name="birth"  autocomplete="date">
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
                                        <input class="form-check-input " type="radio" name="sex" id="sex1" value="M">
                                        <label class="form-check-label" for="sex1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="sex2" value="F">
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
                                        <input class="form-check-input" type="radio" name="driving_licence" id="driving_licence1" value="true">
                                        <label class="form-check-label" for="driving_licence1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="driving_licence" id="driving_licence2" value="false">
                                        <label class="form-check-label" for="driving_licence2">
                                            No
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="genric-btn primary">
                                        {{ __('Register') }}
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
@include('layouts.scripts')
</body>
</html>