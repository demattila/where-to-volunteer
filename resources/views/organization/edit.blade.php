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


<section class="section-top-border">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h5 class="card-header">{{ __('Edit profile') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('organization.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_person" class="col-md-3 col-form-label text-md-right">{{ __('Contact Person') }}*</label>

                                <div class="col-md-7">
                                    <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ $user->contact_person}}" autocomplete="contact_person">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-7 mt-10">
                                    <textarea  id="desc" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="{{$user->description}}" onfocus="this.placeholder =''" onblur="this.placeholder = '{{$user->description}}'"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="founded_at" class="col-md-3 col-form-label text-md-right">{{ __('Founded Date') }}*</label>
                                <div class="col-md-7">
                                    <input id="founded_at" type="date" class="form-control @error('founded_at') is-invalid @enderror" name="founded_at" value="{{ $user->founded_at }}" autocomplete="founded_at">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-7">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" autocomplete="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-right">{{ __('City') }}*</label>

                                <div class="col-md-7">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" autocomplete="city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="region" class="col-md-3 col-form-label text-md-right">{{ __('Region') }}*</label>

                                <div class="col-md-7">
                                    <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ $user->region }}" autocomplete="region">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-3 col-form-label text-md-right">{{ __('Mobile') }}*</label>

                                <div class="col-md-7">
                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $user->mobile }}" autocomplete="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="site" class="col-md-3 col-form-label text-md-right">{{ __('Site') }}</label>

                                <div class="col-md-7">
                                    <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ $user->site }}" autocomplete="site">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Organization Type') }}*</label>
                                <div class="col-md-3">
                                    <select class="nice-select"  name="type" id="type">
                                        <option value="1" @if($user->type_id == 1) selected @endif class="option">Federation</option>
                                        <option value="2" @if($user->type_id == 2) selected @endif class="option">Foundation</option>
                                        <option value="3" @if($user->type_id == 3) selected @endif class="option">Institution</option>
                                        <option value="4" @if($user->type_id == 4) selected @endif class="option">Trade</option>
                                        <option value="5" @if($user->type_id == 5) selected @endif class="option">Union</option>
                                        <option value="6" @if($user->type_id == 6) selected @endif class="option">Association</option>
                                        <option value="7" @if($user->type_id == 7) selected @endif class="option">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="genric-btn primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                    <a href= "{{ route('organization.dashboard') }}" class="genric-btn danger mr-3 ">Go Back</a>
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