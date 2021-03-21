@foreach ($countries as $country)

<option value="{{ $country->id or '' }}" @isset($city->id)

    @if ($country->id == $city->country_id)

    selected="selected"

    @endif

    @endisset

    >{{ $country->title or '' }}</option>

@endforeach