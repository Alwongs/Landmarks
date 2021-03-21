@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Updating user @endslot
    @slot('parent') Home @endslot
    @slot('active') User @endslot
    @endcomponent

    <hr>

    <form action="{{ route('admin.user_management.user.update', $user) }}" class="form-horizontal" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('admin.user_management.users.partials.form')

    </form>

</div>

@endsection