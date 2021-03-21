@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<label for="">Parent Country</label>
<select class="form-control" name="country_id">
    @include('admin.cities.partials.countries', ['countries' => $countries])
</select>


<label for="">Name of the city</label>
<input type="text" class="form-control" name="title" placeholder="city" value="@if(old('title')){{ old('title') }}@else{{ $city->title or '' }}@endif" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Automatic generation" value="{{ $city->slug or '' }}" readonly="">

<hr>

<input type="submit" class="btn btn-primary" value="Save">