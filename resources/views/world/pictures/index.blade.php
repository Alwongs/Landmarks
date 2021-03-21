@extends('layouts.app')

@section('title', $place->title)

@section('content')

<div class="container">
    <!--
    <div class="row">
        <div class="col-sm-12">

            <h1 class="text-center"><a class="badge badge-light" href="{{ route('onePlace', $place->slug) }}">{{ $place->title }}</a></h1>

        </div>
    </div>
-->
    <div class="row">
        <div class="col-sm-12 text-center" style="max-height:500px">
            @if (count($pictures) != 0)
            @foreach($pictures as $picture)
            <img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $picture->image) }}" alt="photo" style="max-height:100%">
            @endforeach
            @else

            <div class="my-5 bg-success">
                <h2> No pictures yet. <br>
                    You can add some if you are loged in..</h2>
            </div>



            @endif
        </div>
    </div>

    <footer class="footer">
        <div class="row">
            <div class="col-sm-6 mx-auto my-4">
                {{ $pictures->links() }}
            </div>
        </div>
    </footer>
</div>

@endsection