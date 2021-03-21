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
    @include('admin.pictures.partials.places', ['places' => $places])
</select>


<label for="textarea">Add a photo</label>
<div class="form-group">
    <input type="file" class="form-control" name="image">
</div>

<hr>

<input type="submit" class="btn btn-primary" value="Save">