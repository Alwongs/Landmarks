@extends('layouts.app')

@section('title', $place->title)

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">

    @component('world.components.breadcrumb')
    @slot('home') Home @endslot
    @slot('country') {{ $place->city->country->title }} @endslot
    @slot('countrySlug') {{ $place->city->country->slug }} @endslot
    @slot('city') {{ $place->city->title }} @endslot
    @slot('citySlug') {{ $place->city->slug }} @endslot
    @slot('place') {{ $place->title }} @endslot
    @endcomponent


    <!--
    <div class="row">
        <div class="col-sm-12">
            <p>
            <h1 class="text-center">{{ $place->title }}</h1>
            </p>
        </div>
    </div>
-->
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-9">

                    <!-- --------------- one big picture --------------------- -->
                    <div class="picture my-4 text-center" style="max-height:600px">
                        @if(asset('/storage/uploads/place/' . $place->title . '.jpg') != null)
                        <img class="img-fluid  img-thumbnail" src="{{ asset('/storage/uploads/place/' . $place->title . '.jpg') }}" alt="{{ $place->title }}" height="100%">
                        @else
                        <img class="img-fluid  img-thumbnail" src="{{ asset('/storage/uploads/nophoto.jpg') }}" alt="alt=nophoto" height="100%">
                        @endif
                    </div>

                    <!--  ----------------------- description ---------------------- -->

                    <div class="description mx-2 my-2">
                        @if($place->description == null)
                        <h2 class="text-center">No description</h2>
                        @else
                        <p>{{ $place->description }}</p>
                        @endif
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="jumbotron my-4 py-1">
                        <!-- ----------------------- Add photos --------------------- -->
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="badge-light" href="{{ route('world.picture.index', $place->id) }}">
                                    <div class="my-1">
                                        <p>
                                        <h5 class="text-center">look more photos..</h5>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--  ------------------- form ---------------------- -->
                        <div class="row">
                            <div class="col-sm-12">
                                @guest
                                <p class="text-center">
                                    <font style="opacity:.4">
                                        <i>Log in to add your picture</i>
                                    </font>
                                </p>
                                @else
                                <form class="form-control" action="{{ route('world.picture.create') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <label for=""><b>Add photo..</b></label>
                                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Upload">
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------ Form comment ------------------------ -->
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <h5>Add your comment ..</h5>
                    <form class="form-inline" action="{{ route('world.comment.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type=" text" class="form-control" name="description" size="75">
                        <input type="hidden" name="slug" value="{{ $place->slug }}">
                        <input type="hidden" name="place_id" value="{{ $place->id }}">
                        @guest
                        <input type="hidden" name="created_by" value="1">
                        @else
                        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                        @endguest
                        <input type="submit" class="btn btn-primary m-1" value="Send" class="form-control">
                    </form>
                </div>
            </div>

            <!--  ------------------- comments ---------------------- -->
            <div class="row my-4 mx-1">
                <div class="col-sm-12">
                    @isset($comments)
                    @forelse ($comments as $comment)

                    <div class="row">
                        <div class="col-cm-12">
                            @if(App\User::find($comment->created_by) != null)
                            <a href="#"><b>{{ App\User::find($comment->created_by)->name }} </b></a>
                            @else
                            <font color="grey" style="opacity: .4;"><del><b>User deleted</b></del></font>
                            @endif
                            <small>
                                <font style="opacity:.4"> {{ $comment->created_at }}</font>
                            </small>
                            <h6><i>- {{ $comment->description }}</i></h6>
                        </div>
                    </div>
                    <br>

                    @empty
                    <div class="row">
                        <div class="col-cm-12 mx-auto">
                            <h2 class="text-center">No comments. You can be first</h2>
                        </div>
                    </div>
                    @endforelse
                    <!-- --------------------- pagination ----------------------- -->
                    <div class="row">
                        <div class="col-cm-12">
                            {{ $comments->links() }}
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

@endsection