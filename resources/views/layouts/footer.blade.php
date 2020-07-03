<footer style="margin-top: 15rem">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">@lang('Our Mission')</h4>
                        <p class="footer-p">
                            @lang('Our goal is to provide an opportunity for everyone to experience volunteering, the happiness provided by helping the community, growing self-confidence, improving mood, and building relationships.')
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">@lang('Quick Links')</h4>
                        <ul class="list">
                            @if($volunteerSignedIn)
                            <li><a href={{route('dashboard')}}>@lang('Home')</a></li>
                            @elseif($organizationSignedIn)
                            <li><a href={{route('organization.dashboard')}}>@lang('Home')</a></li>
                            @else
                            <li><a href={{route('index')}}>@lang('Home')</a></li>
                            @endif
                            <li><a href={{route('events.index')}}>@lang('Events')</a></li>
                            <li><a href={{route('stories.index')}}>@lang('Stories')</a></li>
                            <li><a href={{ route('terms.latest') }}>@lang('Terms of Service')</a></li>
                            <li><a href={{route('about')}}>@lang('About')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4 class="footer_title">@lang('Language')</h4>
                        <ul class="list">
                            <li><img style="width: 2rem" src="{{url('/storage/lang/uk.svg')}}"><a class="text-white ml-2" href="{{url('/lang/en')}}">English</a></li>
                            <li><img style="width: 2rem" src="{{url('/storage/lang/ro.svg')}}"><a class="text-white ml-2" href="{{url('/lang/ro')}}">Română</a></li>
                            <li><img style="width: 2rem" src="{{url('/storage/lang/hu.svg')}}"><a class="text-white ml-2" href="{{url('/lang/hu')}}">Magyar</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="far fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </p>
            </div>
        </div>
    </div>
</footer>