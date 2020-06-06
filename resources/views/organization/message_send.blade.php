<div class="container cellsmoke" style="margin-bottom: 50px">
    <h5 style="margin-bottom: 20px">Send message to all volunteers!</h5>
    @include('layouts.errors')
    <form class="mt-50" action="{{ route('organization.message') }}" method="post">
        @csrf

        <div class="input-group-icon mt-10">
            <div class="icon"><i class="far fa-calendar-alt" aria-hidden="true"></i></div>
            <div class="form-select" id="default-select">
               <select class="nice-select" name="event" id="event">
                   <option value="">Related event</option>
                    @foreach($user->events as $ev)
                    <option value="{{$ev->id}}">{{$ev->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="my-5">
            <textarea name="message" class="single-textarea @error('description') is-invalid @enderror" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"  style="height: 200px"></textarea>
        </div>

        <button class="genric-btn primary" type="submit">Send</button>
    </form>
</div>