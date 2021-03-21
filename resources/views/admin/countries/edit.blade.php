@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Updating country @endslot
    @slot('parent') Home @endslot
    @slot('active') Countries @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.country.update', $country) }}" class="form-horizontal" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

        @include('admin.countries.partials.form')

    </form>

</div>

@endsection