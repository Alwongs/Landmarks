@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Creating country @endslot
    @slot('parent') Home @endslot
    @slot('active') Countries @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.country.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}

        @include('admin.countries.partials.form')

        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
    </form>

</div>

@endsection