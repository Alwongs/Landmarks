@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<label for="">Parent City</label>
<select class="form-control" name="city_id">
    @include('admin.places.partials.cities', ['cities' => $cities])
</select>


<label for="">Name of the place</label>
<input type="text" class="form-control" name="title" placeholder="place" value="@if(old('title')){{ old('title') }}@else{{ $place->title or '' }}@endif" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Automatic generation" value="{{ $place->slug or '' }}" readonly="">

<label for="textarea">Description</label>
<textarea class="form-control" name="description" id="textarea" cols="30" rows="10" value="@if(old('description')){{ old('description') }}@else{{ $place->description or '' }}@endif">{{ $place->description or '' }}</textarea>

<hr>

<input type="submit" class="btn btn-primary" value="Save">