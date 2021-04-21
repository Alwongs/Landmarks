@extends('layouts.app')

@section('title', $place->title)

@section('content')
<!-- ----------------- Errors ------------------------- -->
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
    <!-- =============================================  1-row  =========================================================== -->
    <div class="row px-0">
        <div class="col-sm-12 px-0">
            <!-- --------------- breadcrumbs --------------------------- -->
            @component('world.components.breadcrumb')
            @slot('home') Home @endslot
            @slot('country') {{ $place->city->country->title }} @endslot
            @slot('countrySlug') {{ $place->city->country->slug }} @endslot
            @slot('city') {{ $place->city->title }} @endslot
            @slot('citySlug') {{ $place->city->slug }} @endslot
            @slot('place') {{ $place->title }} @endslot
            @endcomponent
        </div>
    </div>


    <!-- =============================================  2-row  =========================================================== -->
    <div class="row my-0">

        <!-- ---------------------------------------------  Left-coloumn ------------------------------------------------- -->

        <div class="col-sm-2  order-2 order-sm-2 order-lg-1 picture-list jumbotron mb-2 py-4 px-2">
            <!-- --------------- Add-picture --------------------- -->
            <div class="picture-form">
                @guest
                <p class="text-center">
                    <font style="opacity:.4">
                        <i>Log in to add your picture</i>
                    </font>
                </p>
                @else

                <form class="form-control bg-light p-1" action="{{ route('world.picture.create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for=""><b>Add photo..</b></label>
                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                    <div class="form-group">
                        <input type="file" class="form-control p-1" name="image" required>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Upload">
                </form>

                @endguest
            </div>
            <!-- --------------- look more photos --------------------- -->
            <div class="look-more">
                <a class="badge-light" href="{{ route('world.picture.index', $place->id) }}">
                    <div class="my-2 btn-outline-primary text-center py-2" style="overflow: hidden;">
                        <span class="btn p-0 text-center">
                            <h5>look more photos..</h5>
                        </span>
                    </div>
                </a>
            </div>
            <!-- --------------- Picture-list --------------------- 
            <div class="picture-list">
                @foreach($pictures as $picture)
                <div class="btn p-0">
                    <a class="btn p-0" href="#">
                        <img class="img-fluid rounded" src="{{ asset('/storage/' . $picture->image) }}" alt="{{ $picture->title }}">
                    </a>
                </div>
                @endforeach
            </div>
            -->
        </div>


        <!-- ---------------------------------------------  Middle-coloumn ------------------------------------------------- -->

        <div class="col-sm-8  order-1 order-sm-1 order-lg-2">
            <!-- ---------------------- one big picture --------------------- -->
            <div class="picture text-center px-2">
                @if(asset('/storage/uploads/place/' . $place->title . '.jpg') != null)
                <img class="img-fluid rounded" src="{{ asset('/storage/uploads/place/' . $place->title . '.jpg') }}" alt="{{ $place->title }}">
                @else
                <img class="img-fluid  img-thumbnail" src="{{ asset('/storage/uploads/nophoto.jpg') }}" alt="alt=nophoto">
                @endif
            </div>

            <!--  ----------------------- description ---------------------- -->
            <div class="description mx-2 my-0 py-3">
                @if($place->description == null)
                <h2 class="text-center">No description</h2>
                @else
                <p>{{ $place->description }}</p>
                @endif
            </div>

            <!--  ----------------------- Comment-form ---------------------- -->
            <div class="comment-form">
                <h5>Add your comment ..</h5>
                <form class="form-inline" action="{{ route('world.comment.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type=" text" class="form-control" name="description">
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

            <!--  ------------------------ comments ---------------------- -->
            <div class="comments">
                @isset($comments)
                @forelse ($comments as $comment)

                <div class="comments-item">
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
                <br>
                @empty
                <div class="comments mx-auto">
                    <h2 class="text-center">No comments. You can be first</h2>
                </div>
                @endforelse

                <!-- --------------------- pagination ----------------------- -->
                <div class="comments-pagination">
                    {{ $comments->links() }}
                </div>
                @endisset
            </div>
        </div>

        <!-- --------------------------------------------- Right-coloumn ------------------------------------------------- -->

        <div class="col-sm-2  order-3 order-sm-3 order-lg-3 place-list jumbotron mb-2 py-4 px-2">

            <!-- ---------------- Place list ----------------- -->
            @foreach($place->city->places as $place)
            <a class="badge-light" href="{{ route('onePlace', $place->slug) }}">
                <div class="my-1 btn-outline-primary text-center" style="overflow: hidden;">
                    <span class="btn text-center">
                        <h5>{{ $place->title }}</h5>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection