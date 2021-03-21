@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Updating comment @endslot
    @slot('parent') Home @endslot
    @slot('active') Comment @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.comment.update', $comment) }}" class="form-horizontal" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

        @include('admin.comments.partials.form')

    </form>

</div>

@endsection