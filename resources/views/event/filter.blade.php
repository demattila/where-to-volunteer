<div class="row" >
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form class="form-inline justify-content-center" method="get" action="{{ route('events.index') }}" >
            @csrf
            <label class="m-2" for="region">{{ __('Region') }}:</label>
            <select class="m-2" id="region" name="region" >
                <option disabled selected value> -- select -- </option>
                @foreach($regions as $region)
                    <option value="{{$region->name}}">{{$region->name}}</option>
                @endforeach
            </select>

            <label class="m-2" for="category">{{ __('Category') }}:</label>
            <select class="m-2" id="category" name="category" >
                <option disabled selected value> -- select -- </option>
                @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>

            <label class="m-2" for="per_page">{{ __('Items on page') }}:</label>
            <input id="per_page" type="number" name="per_page" style="width: 3rem">

            <button type="submit" class="genric-btn primary m-2">{{ __('Filter') }}</button>
        </form>
    </div>
    <div class="col-sm-1"></div>
</div>
