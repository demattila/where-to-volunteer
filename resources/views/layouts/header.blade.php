<header class="header_area">
    <div class="main_menu">
        @include('shared.header_message')
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
                            <li style="display: @if(auth()->guard('web_organization')->check()) none @endif"
                                class="nav-item {{Request::path() ==='/' ? 'active' : ''}}
                                                {{Request::path() ==='dashboard' ? 'active' : ''}}
                                                {{Request::path() ==='login' ? 'active' : ''}}">
                                <a class="nav-link" href={{route('index')}}>
                                    @if(auth()->guard('web')->check())
                                        {{__('Dashboard')}}
                                    @else
                                        {{__('Volunteer')}}
                                    @endif
                                </a>
                            </li>
                            <li style="display: @if(auth()->guard('web')->check()) none @endif"
                                class="nav-item {{Request::path() ==='organization' ? 'active' : ''}}
                                                {{Request::path() ==='organization/dashboard' ? 'active' : ''}}
                                                {{Request::path() ==='organization/login' ? 'active' : ''}}">
                                <a class="nav-link" href={{route('organization.index')}}>
                                    @if(auth()->guard('web_organization')->check())
                                        {{__('Dashboard')}}
                                    @else
                                        {{__('Organization')}}
                                    @endif
                                </a>
                            </li>
                            {{--<li class="nav-item {{Request::path() ==='/' ? 'active' : ''}}"><a class="nav-link" href={{route('volunteer.index')}}>Home</a></li>--}}
                            <li class="nav-item {{Request::path() ==='events' ? 'active' : ''}}"><a class="nav-link" href={{route('events.index')}}>{{__('Events')}}</a></li>
                            <li class="nav-item {{Request::path() ==='stories' ? 'active' : ''}}"><a class="nav-link" href={{route('stories.index')}}>{{__('Stories')}}</a></li>
                            <li class="nav-item {{Request::path() ==='terms' ? 'active' : ''}}"><a class="nav-link" href="{{ route('terms.index') }}">{{ __('Terms') }}</a></li>
                            <li class="nav-item {{Request::path() ==='about' ? 'active' : ''}}"><a class="nav-link" href={{route('about')}}>{{__('About')}}</a></li>
                            <li class="nav-item submenu dropdown">
                                @if ( Config::get('app.locale') == 'en')
                                <a href="{{url('/lang/en')}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">EN</a>
                                @elseif ( Config::get('app.locale') == 'ro' )
                                <a href="{{url('/lang/ro')}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RO</a>
                                @elseif ( Config::get('app.locale') == 'hu' )
                                <a href="{{url('/lang/hu')}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HU</a>
                                @endif
                                    <ul class="dropdown-menu">
                                    @if ( Config::get('app.locale') == 'en')
                                        <li class="nav-item"><a class="nav-link" href="{{url('/lang/hu')}}">HU</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/lang/ro')}}">RO</a></li>
                                    @elseif ( Config::get('app.locale') == 'ro' )
                                        <li class="nav-item"><a class="nav-link" href="{{url('/lang/en')}}">EN</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/lang/hu')}}">HU</a></li>
                                    @elseif ( Config::get('app.locale') == 'hu' )
                                        <li class="nav-item"><a class="nav-link" href="{{url('/lang/en')}}">EN</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/lang/ro')}}">RO</a></li>
                                    @endif

                                </ul>
                            </li>
                            {{--@if (App::isLocale('en'))--}}
                            {{--<li class="nav-item"><a class="nav-link">English</a></li>--}}
                            {{--@endif--}}

{{--                            @if(!empty($user))--}}
{{--                            {{dd($user)}}--}}
                            @auth('web')
                                {{--<li class="nav-item dropdown">--}}
                                    {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--<i class="fas fa-bell fa-2x"></i>--}}
                                    {{--</a>--}}
                                    {{--<div class="dropdown-menu">--}}

                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item dropdown">--}}
                                    {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--@if($user->avatar_url)--}}
                                        {{--{{dump($user->avatar_url)}}--}}
                                            {{--<img src="{{$user->avatar_url}}" alt="avatar" class="rounded-circle">--}}
                                        {{--@endif--}}
                                    {{--</a>--}}
                                    {{--<div class="dropdown-menu">--}}
                                        {{--<a class="dropdown-item" href="{{route('dashboard')}}"><h6>{{$user->name }}</h6></a>--}}
                                        {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                                                 {{--onclick="event.preventDefault();--}}
                                                                          {{--document.getElementById('logout-form-1').submit();">--}}
                                            {{--{{ __('Logout') }}</a>--}}

                                        {{--<form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--@csrf--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</li>--}}

                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{$user->avatar_url}}" alt="avatar" class="rounded-circle">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('dashboard')}}">{{$user->name }}</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                               document.getElementById('logout-form-1').submit();">
                                            {{ __('Logout') }}</a>
                                            <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('web_organization')
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{$user->avatar_url}}" alt="avatar" class="rounded-circle">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('organization.dashboard')}}">{{ $user->name }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('organization.logout') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form-2').submit();">
                                                {{ __('Logout') }}</a>
                                            <form id="logout-form-2" action="{{ route('organization.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            {{--@endif--}}
                        </ul>
                    </div>
                </div>

            </nav>
        </div>
    </div>
</header>
