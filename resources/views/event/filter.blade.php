<div class="row" >
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form class="form-inline justify-content-center" action="{{route('event.filter')}}" method="post">
            @csrf
            <label class="m-2" for="region">{{ __('Region') }}:</label>
            <select class="m-2" id="region" name="region" >
                <option disabled selected value> -- select an option -- </option>
                @foreach($regions as $region)
                    <option value="{{$region}}">{{$region}}</option>
                @endforeach
            </select>

            <label class="m-2" for="category">{{ __('Category') }}:</label>
            <select class="m-2"id="category" name="category" >
                <option disabled selected value> -- select an option -- </option>
                @foreach($categories as $category)
                    <option value="{{$category}}">{{$category}}</option>
                @endforeach
            </select>

            <button type="submit" class="genric-btn primary m-2">{{ __('Search') }}</button>
        </form>
    </div>
    <div class="col-sm-1"></div>
</div>
