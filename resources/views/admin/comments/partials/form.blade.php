@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<label for="">Parent Place</label>
<select class="form-control" name="place_id">
    @include('admin.comments.partials.places', ['places' => $places])
</select>


<label for="textarea">Description</label>
<textarea class="form-control" name="description" id="textarea" cols="30" rows="10" value="@if(old('description')){{ old('description') }}@else{{ $place->description or '' }}@endif">{{ $comment->description or '' }}</textarea>

<hr>

<input type="submit" class="btn btn-primary" value="Save">