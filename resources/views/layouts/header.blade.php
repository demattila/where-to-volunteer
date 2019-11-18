<header class="header_area">
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href={{route('index')}}><img src={{url('img/wtv_n.svg')}} alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            {{--{{dump(Request::path())}}--}}
                            <li class="nav-item {{Request::path() ==='/' ? 'active' : ''}}"><a class="nav-link" href={{route('index')}}>Volunteer</a></li>
                            <li class="nav-item {{Request::path() ==='organization' ? 'active' : ''}}"><a class="nav-link" href={{route('organization.index')}}>Organization</a></li>
                            {{--<li class="nav-item {{Request::path() ==='/' ? 'active' : ''}}"><a class="nav-link" href={{route('volunteer.index')}}>Home</a></li>--}}
                            <li class="nav-item {{Request::path() ==='events' ? 'active' : ''}}"><a class="nav-link" href={{route('events.index')}}>Events</a></li>
                            <li class="nav-item {{Request::path() ==='about' ? 'active' : ''}}"><a class="nav-link" href={{route('about')}}>About</a></li>

                            {{--@guest--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                                {{--</li>--}}
                                {{--@if (Route::has('register'))--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            {{--@else--}}
                                {{--<li class="nav-item submenu dropdown">--}}
                                    {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--Logged in as: {{ Auth::user()->name }} <span class="caret"></span></a>--}}
                                    {{--<div class="dropdown-menu">--}}
                                        {{--<a class="nav-item"><a class="nav-link" href="{{ route('logout') }}"--}}
                                                                {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--{{ __('Logout') }}</a>--}}
                                        {{--</a>--}}
                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--@csrf--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endguest--}}

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>