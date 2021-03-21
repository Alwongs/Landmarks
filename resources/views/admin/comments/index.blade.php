@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Comment list @endslot
    @slot('parent') Home @endslot
    @slot('active') Comments @endslot
    @endcomponent

    <hr>

    <a href="{{ route('admin.comment.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Create a comment</a>

    <table class="table  table-striped">
        <thead>
            <th>Name</th>
            <th class="text-right">Action</th>
        </thead>
        <tbody>
            @forelse ($comments as $comment)
            <tr>
                <td>{{ $comment->description }}</td>
                <td class="text-right">

                    <form onsubmit="if(confirm('Do you really want to delete this comment?')){ return true }else{ return false }" action="{{ route('admin.comment.destroy', $comment) }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <a class="btn btn-default" href="{{ route('admin.comment.edit', $comment) }}"><i class="fa fa-edit"></i></a>
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
                        {{ $comments->links() }}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>

</div>

@endsection