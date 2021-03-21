@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Creating city @endslot
    @slot('parent') Home @endslot
    @slot('active') Cities @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.city.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}

        @include('admin.cities.partials.form')

        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
    </form>
</div>

@endsection