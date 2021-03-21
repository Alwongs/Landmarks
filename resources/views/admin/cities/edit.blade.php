@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Updating city @endslot
    @slot('parent') Home @endslot
    @slot('active') Cities @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.city.update', $city) }}" class="form-horizontal" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

        @include('admin.cities.partials.form')

    </form>

</div>

@endsection