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
                <h2>Organization register</h2>
            </div>
        </div>
    </div>
</section>

<section class="event_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Register') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('organization.register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}*</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_person" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}*</label>

                                <div class="col-md-6">
                                    <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" autocomplete="contact_person">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6 mt-10">
                                    <textarea  id="desc" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="founded_at" class="col-md-4 col-form-label text-md-right">{{ __('Founded Date') }}*</label>
                                <div class="col-md-6">
                                    <input id="founded_at" type="date" class="form-control @error('founded_at') is-invalid @enderror" name="founded_at" value="{{ old('founded_at') }}" autocomplete="founded_at">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}*</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}*</label>

                                <div class="col-md-6">
                                    <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" autocomplete="region">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}*</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="site" class="col-md-4 col-form-label text-md-right">{{ __('Site') }}</label>

                                <div class="col-md-6">
                                    <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ old('site') }}" autocomplete="site">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Organization Type') }}*</label>
                                <div class="col-md-3">
                                    <select class="nice-select"  name="type" id="type">
                                        <option value="1" class="option">Federation</option>
                                        <option value="2" class="option">Foundation</option>
                                        <option value="3" class="option">Institution</option>
                                        <option value="4" class="option">Trade</option>
                                        <option value="5" class="option">Union</option>
                                        <option value="6" class="option">Association</option>
                                        <option value="7" class="option">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <input id="terms" type="checkbox" name="terms">
                                    <label for="terms">Accept our <a href="{{route('terms.latest')}}">Terms of Service</a></label>

                                    @error('terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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