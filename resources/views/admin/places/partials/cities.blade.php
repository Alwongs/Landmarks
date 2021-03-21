@foreach ($cities as $city)

<option value="{{ $city->id or '' }}" @isset($place->id)

    @if ($city->id == $place->city_id )

    selected="selected"

    @endif

    @endisset

    >{{ $city->title or '' }}</option>

@endforeach