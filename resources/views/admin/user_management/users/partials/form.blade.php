@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<label for="">Name</label>
<input type="text" class="form-control" name="name" placeholder="name" value="@if(old('title')){{ old('title') }}@else{{ $user->name or '' }}@endif" required>

<label for="">Email</label>
<input type="email" class="form-control" name="email" placeholder="email" value="@if(old('title')){{ old('title') }}@else{{ $user->email or '' }}@endif" required>

<label for="">Password</label>
<input type="password" class="form-control" name="password">

<label for="">Confirmation</label>
<input type="password" class="form-control" name="password_confirmation">

<hr>

<input type="submit" class="btn btn-primary" value="Save">