@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Creating a place @endslot
    @slot('parent') Home @endslot
    @slot('active') places @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.place.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}

        @include('admin.places.partials.form')

        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
    </form>
</div>

@endsection