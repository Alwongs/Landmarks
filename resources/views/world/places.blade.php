@extends('layouts.app')

@isset($city)
@section('title', $city->title)
@else
@section('title', 'Place list')
@endisset

@section('content')

<div class="container">

    @component('world.components.breadcrumb')
    @slot('home') Home @endslot
    @slot('country') {{ $city->country->title }} @endslot
    @slot('countrySlug') {{ $city->country->slug }} @endslot
    @slot('city') {{ $city->title }} @endslot
    @slot('citySlug') {{ $city->slug }} @endslot
    @endcomponent


    <!-- ------------------------ title ------------------------ -->
    <!--
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>{{ $city->title }}</h1>
        </div>
    </div>
    -->
    <!-- ------------------------ Image ------------------------ -->
    <div class="row">
        <div class="col-sm-12 text-center">
            <img class="img-fluid  img-thumbnail" src="{{ asset('/storage/uploads/city/' . $city->title . '.jpg') }}" alt="city photo" width="100%">
        </div>
    </div>
    <!-- ------------------------ Places ------------------------ -->
    <div class="row my-5">
        <div class="col-sm-12">
            @forelse ($places->chunk(6) as $chunk)
            <div class="row mx-1">
                @foreach ($chunk as $place)
                <div class="col item btn btn-outline-primary m-1 outblock" onclick="location.href='{{ route('onePlace', $place->slug) }}'">
                    <a class="btn" href="{{ route('onePlace', $place->slug) }}">
                        <h4 class="textin">{{ $place->title }}</h4>
                    </a>
                </div>
                @endforeach
            </div>
            @empty
            <h2 class="text-center">Empty</h2>
            @endforelse
        </div>
    </div>


</div>

@endsection