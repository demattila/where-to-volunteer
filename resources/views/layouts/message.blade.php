@if (session()->has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{{session()->get('message')}}</li>
        </ul>
    </div>
@endif