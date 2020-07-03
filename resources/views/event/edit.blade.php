<!doctype html>
<html lang="en">
<head>
    <title>Edit event</title>
    @include('layouts.head')
</head>
<body>
@include('layouts.header')

 <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Edit event</h2>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ __('Edit event') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('events.update',['event' => $event]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}*</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $event->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="desc" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6 mt-10">
                                    <textarea rows="9"  id="desc" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'">{{$event->description}}</textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $event->address }}" autocomplete="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-right">{{ __('City') }}*</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $event->city }}" autocomplete="city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="region" class="col-md-3 col-form-label text-md-right">{{ __('Region') }}*</label>

                                <div class="col-md-6">
                                    <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ $event->region }}" autocomplete="region">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-3 col-form-label text-md-right">{{ __('Duration') }}*</label>
                                <div class="col-md-3">
                                    From <input id="duration" type="date" class="form-control @error('starts_at') is-invalid @enderror" name="starts_at" value="{{ $event->starts_at->format('Y.m.d') }}" autocomplete="starts_at" >
                                </div>
                                <div class="col-md-3">
                                    To <input id="duration" type="date" class="form-control @error('ends_at') is-invalid @enderror" name="ends_at" value="{{ $event->ends_at->format('Y.m.d') }}" autocomplete="ends_at">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mission" class="col-md-3 col-form-label text-md-right">{{ __('Volunteer mission') }}*</label>

                                <div class="col-md-6">
                                    <input id="mission" type="text" class="form-control @error('mission') is-invalid @enderror" name="mission" value="{{ $event->mission }}" autocomplete="mission">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reward" class="col-md-3 col-form-label text-md-right">{{ __('Reward') }}</label>

                                <div class="col-md-6">
                                    <input id="reward" type="text" class="form-control @error('reward') is-invalid @enderror" name="reward" value="{{ $event->reward }}" autocomplete="reward">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label text-md-right">{{ __('Categories') }}*</label>

                                <div class="col-md-4">
                                    @foreach($categories as $category)
                                        <div class="switch-wrap d-flex justify-content-between" required>
                                            <p>{{$category->name}}</p>
                                            <div class="primary-checkbox">
                                                <input type="checkbox" id="default-checkbox{{$category->id}}" name="categoriesArray[]" value="{{$category->id}}" @if($event->categories->contains($category->id)) checked @endif >
                                                <label for="default-checkbox{{$category->id}}"></label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="info" class="col-md-3 col-form-label text-md-right">{{ __('Additional Info') }}*</label>

                                <div class="col-md-6">
                                    <textarea rows="5"  id="info" name="info" class="form-control @error('info') is-invalid @enderror"  placeholder="More info" onfocus="this.placeholder = ''" onblur="this.placeholder = 'More info'">{{$event->info}}</textarea>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="genric-btn primary">
                                        {{ __('Update Event') }}
                                    </button>
                                    <a href= "{{ route('organization.dashboard') }}" class="genric-btn danger mr-3 ">Cancel</a>
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