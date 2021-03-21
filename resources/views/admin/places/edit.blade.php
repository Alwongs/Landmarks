@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Updating place @endslot
    @slot('parent') Home @endslot
    @slot('active') Places @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.place.update', $place) }}" class="form-horizontal" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

        @include('admin.places.partials.form')

    </form>

</div>

@endsection