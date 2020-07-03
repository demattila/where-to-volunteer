
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('vendors/jquery-ui/jquery-ui.js')}}"></script>--}}
<script src="{{asset('js/stellar.js')}}"></script>
<script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>


<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"> </script>
<script src="{{asset('js/gmaps.min.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>

<script src="{{asset('js/scroll.js')}}"></script>
<script src="{{asset('js/ajaxsearch.js')}}"></script>
<script src="{{asset('js/favorite.js')}}"></script>
<script src="{{asset('js/popover_custom.js')}}"></script>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@if($volunteerSignedIn)
    <script type="text/javascript" src="{{ asset('js/pusherNotifyVolunteer.js') }}"></script>
@elseif($organizationSignedIn)
    <script type="text/javascript" src="{{ asset('js/pusherNotifyOrganization.js') }}"></script>
@endif


