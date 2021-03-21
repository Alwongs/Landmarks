@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Country list @endslot
    @slot('parent') Home @endslot
    @slot('active') Countries @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.country.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create a country</a>

    <table class="table  table-striped">
        <thead>
            <th>Name</th>
            <th class="text-right">Action</th>
        </thead>
        <tbody>
            @forelse ($countries as $country)
            <tr>
                <td><a href="{{ route('admin.country.show', $country) }}">{{ $country->title }}</a></td>
                <td class="text-right">

                    <form onsubmit="if(confirm('Do you really want to delete this country?')){ return true }else{ return false }" action="{{ route('admin.country.destroy', $country) }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <a class="btn btn-default" href="{{ route('admin.country.edit', $country) }}"><i class="fa fa-edit"></i></a>
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
                        {{ $countries->links() }}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>

</div>

@endsection