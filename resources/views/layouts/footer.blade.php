<footer style="margin-top: 15rem">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Our Mission</h4>
                        <p class="footer-p">
                            So seed seed green that winged cattle in. Gathering thing made fly you're no
                            divided deep moved us lan Gathering thing us land years living.
                        </p>
                        <p class="footer-p">
                            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            @if($volunteerSignedIn)
                            <li><a href={{route('dashboard')}}>Home</a></li>
                            @elseif($organizationSignedIn)
                            <li><a href={{route('organization.dashboard')}}>Home</a></li>
                            @else
                            <li><a href={{route('index')}}>Home</a></li>
                            @endif
                            <li><a href={{route('events.index')}}>Events</a></li>
                            <li><a href={{route('stories.index')}}>Stories</a></li>
                            <li><a href={{ route('terms.latest') }}>Terms of Service</a></li>
                            <li><a href={{route('about')}}>About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4 class="footer_title">Language</h4>
                        <ul class="list">
                            <li><img style="width: 2rem" src="{{url('/storage/lang/uk.svg')}}"><a class="text-white ml-2" href="{{url('/lang/en')}}">English</a></li>
                            <li><img style="width: 2rem" src="{{url('/storage/lang/ro.svg')}}"><a class="text-white ml-2" href="{{url('/lang/ro')}}">Română</a></li>
                            <li><img style="width: 2rem" src="{{url('/storage/lang/hu.svg')}}"><a class="text-white ml-2" href="{{url('/lang/hu')}}">Magyar</a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">--}}
                    {{--<div class="single-footer-widget tp_widgets">--}}
                        {{--<h4 class="footer_title">Contact Us</h4>--}}
                        {{--<div class="ml-40">--}}
                            {{--<p class="sm-head">--}}
                                {{--<span class="fa fa-location-arrow"></span>--}}
                                {{--Head Office--}}
                            {{--</p>--}}
                            {{--<p>123, Main Street, Your City</p>--}}

                            {{--<p class="sm-head">--}}
                                {{--<span class="fa fa-phone"></span>--}}
                                {{--Phone Number--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--+123 456 7890 <br>--}}
                                {{--+123 456 7890--}}
                            {{--</p>--}}

                            {{--<p class="sm-head">--}}
                                {{--<span class="fa fa-envelope"></span>--}}
                                {{--Email--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--free@infoexample.com <br>--}}
                                {{--www.infoexample.com--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="far fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>