@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="jumbotron">
                <p class="text-center">
                    <span class="label label-primary">
                        <a class="nav-link dropdown-item" href="{{ route('admin.country.index') }}">
                            Countries: {{ $countryCount }}
                        </a>
                    </span>
                </p>



            </div>
        </div>
        <div class="col-sm-2">
            <div class="jumbotron">
                <p class="text-center"><span class="label label-primary"> <a class="nav-link dropdown-item" href="{{ route('admin.city.index') }}">Cities: {{ $cityCount }}</a></span></p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="jumbotron">
                <p class="text-center"><span class="label label-primary"><a class="nav-link dropdown-item" href="{{ route('admin.place.index') }}">Places: {{ $placeCount }}</a></span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p class="text-center"><span class="label label-primary"><a class="nav-link dropdown-item" href="{{ route('admin.comment.index') }}">Comments: {{ $commentCount }}</a></span></p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="jumbotron">
                <p class="text-center"><span class="label label-primary"><a class="nav-link dropdown-item" href="{{ route('admin.picture.index') }}">Pictures: {{ $pictureCount }}</a></span></p>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------- -->
    <div class="row">
        <div class="col-sm-3">
            @foreach($countries as $country)
            <a href="{{ route('admin.country.edit', $country) }}" class="list-group-item">
                <h4 class="list-group-item-heading">{{ $country->title }}</h4>
                <p class="list-group-item-text">
                    {{ $country->cities()->count() }} cities
                </p>
            </a>
            @endforeach
        </div>
        <div class="col-sm-2">
            @foreach($cities as $city)
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">{{ $city->title }}</h4>
                <p class="list-group-item-text">
                    {{ $city->places()->count() }} places
                </p>
            </a>
            @endforeach
        </div>
        <div class="col-sm-2">
            @foreach($places as $place)
            <a href="#" class="list-group-item">
                {{ $place->city->title }}
                <h4 class="list-group-item-heading">{{ $place->title }}</h4>
                <p class="list-group-item-text">
                    <small>{{ $place->comments()->count() }} comments</small>
                </p>
            </a>
            @endforeach
        </div>
        <div class="col-sm-3">
            @foreach($comments as $comment)
            <a href="#" class="list-group-item">
                <p class="list-group-item-text">
                    {{ $comment->place->title }}
                </p>
                <h5 class="list-group-item-heading"><i>- {{ $comment->description }}</i></h5>
            </a>
            @endforeach
        </div>
        <div class="col-sm-2">
            @foreach($pictures as $picture)
            <a href="#" class="list-group-item">
                <p class="list-group-item-text">
                    {{ $picture->place->title }}
                </p>
                <p class="list-group-item-text">
                    <img src="{{ asset('/storage/' . $picture->image) }}" alt="" width="100">
                </p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection