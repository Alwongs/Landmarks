@extends('layouts.app')

@section('content')

<div class="container">
    <!-- ------------------------ Image ------------------------ -->
    <div class="row">
        <div class="col-sm-12 text-center">
            <img class="img-fluid img-thumbnail" src="{{ asset('/storage/uploads/welcom.jpg') }}" alt="welcom-photo" width="100%">
        </div>
    </div>
    <!-- ------------------------ Countries ------------------------ -->
    <div class="row m-1 my-4">
        <div class="col-sm-12">
            @forelse ($countries->chunk(6) as $chunk)
            <div class="row">
                @foreach ($chunk as $country)
                <div class="col item btn btn-outline-primary m-1">
                    <a class="btn" href="{{ route('cities', $country->slug) }}">
                        <h4>{{ $country->title }}</h4>
                    </a>
                </div>
                @endforeach
            </div>
            @empty
            <h2 class="text-center">No countries in the database</h2>
            @endforelse
        </div>
    </div>
</div>

@endsection