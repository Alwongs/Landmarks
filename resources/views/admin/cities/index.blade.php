@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') City list @endslot
    @slot('parent') Home @endslot
    @slot('active') Cities @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.city.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create a city</a>

    <table class="table  table-striped">
        <thead>
            <th>Name</th>
            <th class="text-right">Action</th>
        </thead>
        <tbody>
            @forelse ($cities as $city)
            <tr>
                <td><a href="{{ route('admin.city.show', $city) }}">{{ $city->title }}</a></td>
                <td class="text-right">

                    <form onsubmit="if(confirm('Do you really want to delete this city?')){ return true }else{ return false }" action="{{ route('admin.city.destroy', $city) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">

                        <a class="btn btn-default" href="{{ route('admin.city.edit', $city) }}"><i class="fa fa-edit"></i></a>
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
                        {{ $cities->links() }}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>

</div>

@endsection