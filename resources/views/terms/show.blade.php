<!doctype html>
<html lang="en">
<head>
    <title>Latest Terms of Service</title>
    @include('layouts.head')
</head>

<body onload="scrolll()">
@include('layouts.header')

<!--================ Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Terms of Service</h2>
            </div>
        </div>
    </div>
</section>

<section class="section-top-border">
    <div class="container">
        <h3>Terms of Service</h3>
        <p style="font-size: 12px"> Published at {{$term->published_at}}</p>
        <p>{{$term->content}}</p>
        <h5>Cookies</h5>
        <p>
        We employ the use of cookies. By accessing Website Name, you agreed to use cookies in agreement with the Company Name's Privacy Policy.
        </p>
        <p>
        Most interactive websites use cookies to let us retrieve the user's details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.
        </p>
    </div>
</section>

<!--================ Start footer Area  =================-->
@include('layouts.footer')
<!--================ End footer Area  =================-->

@include('layouts.scripts')

</body>
</html>

