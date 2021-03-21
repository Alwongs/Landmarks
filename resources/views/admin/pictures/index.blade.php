@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Picture list @endslot
    @slot('parent') Home @endslot
    @slot('active') Pictures @endslot
    @endcomponent

    <hr>

    <a href="{{ route('admin.picture.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create a picture</a>

    <table class="table  table-striped">
        <thead>
            <th>Image</th>
            <th>title</th>
            <th class="text-right">Action</th>
        </thead>
        <tbody>
            @forelse ($pictures as $picture)
            <tr>
                <td>
                    <a href="{{ route('admin.picture.show', $picture) }}">
                        <img src="{{ asset('/storage/' . $picture->image) }}" alt="" width="100">
                    </a>
                </td>
                <td>{{ $picture->title }}</td>
                <td class="text-right">

                    <form onsubmit="if(confirm('Do you really want to delete this place?')){ return true }else{ return false }" action="{{ route('admin.picture.destroy', $picture) }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <a class="btn btn-default" href="{{ route('admin.picture.edit', $picture) }}"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    <h2>No data</h2>
                </td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $pictures->links() }}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>

</div>

@endsection