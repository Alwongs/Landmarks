@foreach ($places as $place)

<option value="{{ $place->id or '' }}" @isset($comment->id)

    @if ($place->id == $comment->place_id)

    selected="selected"

    @endif

    @endisset

    >{{ $place->title or '' }}</option>

@endforeach