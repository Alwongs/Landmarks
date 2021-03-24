@extends('layouts.app')

@isset($country)
@section('title', $country->title)
@else
@section('title', 'City list')
@endisset

@section('content')

<div class="container">
    <!-- ------------------------ title ------------------------ -->
    <!--
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>{{ $country->title }}</h1>
        </div>
    </div>
    -->
    <!-- ------------------------ Image ------------------------ -->
    <div class="row">
        <div class="col-sm-12 text-center">
            <img class="img-fluid  img-thumbnail" src="{{ asset('/storage/uploads/country/' . $country->title . '.jpg') }}" alt="country photo" width="100%">
        </div>
    </div>
    <!-- ------------------------ Cities ------------------------ -->
    <div class="row my-5">
        <div class="col-sm-12">
            @forelse ($cities->chunk(6) as $chunk)
            <div class="row mx-1">
                @foreach ($chunk as $city)
                <div class="col item btn btn-outline-primary m-1 outblock" onclick="location.href='{{ route('places', $city->slug) }}'">
                    <a class="btn" href="{{ route('places', $city->slug) }}">
                        <h4 class="textin">{{ $city->title }}</h4>
                    </a>
                </div>
                @endforeach
            </div>
            @empty
            <h2 class="text-center">No cities in the country</h2>
            @endforelse
        </div>
    </div>
</div>

@endsection