@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="card" style="width: 18rem;">

        <img class="card-img-top" src="img/volunteer/v1.jpg/" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{Auth::guard('web')->user()->name}}</h5>
            <p>{{Auth::guard('web')->user()->email}}</p>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="genric-btn danger medium" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">{{ __('Logout') }}<span class="lnr lnr-arrow-right"></span></a>
        </div>
    </div>
</section>
@endsection
