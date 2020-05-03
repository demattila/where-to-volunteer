@extends('layouts.app')

@section('title','Create Terms')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('terms.store')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Administrative Name') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-md-3 col-form-label text-md-right">{{ __('Content') }}</label>
                                <div class="col-md-8">
                                    <textarea rows="15"  id="content" name="content" class="form-control @error('content') is-invalid @enderror"  placeholder="Content" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Content'"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label class="col-md-3"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add new Term') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
