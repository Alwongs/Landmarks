@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Place list @endslot
    @slot('parent') Home @endslot
    @slot('active') Places @endslot
    @endcomponent

    <hr>

    <a href="{{ route('admin.place.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create a place</a>

    <table class="table table-striped">
        <thead>
            <th>Name</th>
            <th>Comments</th>
            <th>Pictures</th>
            <th>Created by</th>
            <th class="text-right">Action</th>
        </thead>
        <tbody>
            @forelse ($places as $place)
            <tr>
                <td>{{ $place->title }}</td>
                <td><a href="{{ route('admin.place.show', $place) }}">comments</a></td>
                <td><a href="{{ route('admin.pictures.place', ['place_id' => $place->id]) }}">pictures</a></td>
                <td>{{ App\User::find($place->created_by)->name }}</td>
                <td class="text-right">

                    <form onsubmit="if(confirm('Do you really want to delete this place?')){ return true }else{ return false }" action="{{ route('admin.place.destroy', $place) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">

                        <a class="btn btn-default" href="{{ route('admin.place.edit', $place) }}"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    <h2>No data</h2>
                </td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $places->links() }}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>

</div>

@endsection