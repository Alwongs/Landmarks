@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Creating a picture @endslot
    @slot('parent') Home @endslot
    @slot('active') pictures @endslot
    @endcomponent

    <hr>

    <form class="form-control" action="{{ route('admin.picture.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include('admin.pictures.partials.form')

        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
    </form>
</div>

@endsection