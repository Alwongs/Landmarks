@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Creating a comment @endslot
    @slot('parent') Home @endslot
    @slot('active') comments @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.comment.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}

        @include('admin.comments.partials.form')

        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
    </form>
</div>

@endsection