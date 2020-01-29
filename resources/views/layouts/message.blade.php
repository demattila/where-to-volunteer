@if (session()->has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{{session()->get('message')}}</li>
        </ul>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{{session()->get('error')}}</li>
        </ul>
    </div>
@endif