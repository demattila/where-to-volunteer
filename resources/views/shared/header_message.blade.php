@if($volunteerSignedIn || $organizationSignedIn)
@if(!$user->hasAcceptedLatestTerms())

<div style="background-color: #c8cbcf;width: 100%;text-align: center;" class="pt-2">
    <p style="display: inline-block;">You have not accepted our latest <a href="{{route('terms.latest')}}">Terms of Service</a>.</p>
    <p style="display: inline-block;">Check the last accepted terms <a href="{{route('terms.show',$user->currentlyAcceptedTerm())}}">here</a>.</p>
    <button style="display: inline-block; height:30px"
            onclick="event.preventDefault();
            document.getElementById('accept-form').submit();">
        Accept
    </button>
</div>
<form id="accept-form" action="{{route('terms.accept')}}" method="POST" style="display: none;">
    @csrf
</form>
@endif
@endif

