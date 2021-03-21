@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<label for="">Name of the country</label>
<input type="text" class="form-control" name="title" placeholder="country" value="@if(old('title')){{ old('title') }}@else{{ $country->title or '' }}@endif" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Automatic generation" value="{{ $country->slug or '' }}" readonly="">

<hr>

<input type="submit" class="btn btn-primary" value="Save">