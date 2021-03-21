<?php

namespace App\Http\Controllers\Admin;

use App\Place;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.places.index', [
            'places' => Place::orderBy('title')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.places.create', [
            'place' => [],
            'cities' => City::orderBy('title')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Place::create($request->all());
        return redirect()->route('admin.place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laravel\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $comments = $place->comments()->paginate(10);
        return view('admin.comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravel\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('admin.places.edit', [
            'place' => $place,
            'cities' => City::orderBy('title')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $place->update($request->except('slug'));
        return redirect()->route('admin.place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laravel\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->route('admin.place.index');
    }
}
