<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pictures.index', [
            'pictures' => Picture::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pictures.create', [
            'picture' => [],
            'places' => Place::orderBy('title')->get()
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
        // $path = $request->file('image')->store('uploads', 'public');
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg|dimensions:min_width=600,min_height=600'
        ]);

        $file = $request->file('image');
        $fileOriginalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $fileNewName = $fileOriginalName . "-" . time() . "." . $file->getClientOriginalExtension();

        $path = storage_path('app/public/uploads/' . $fileNewName);

        $image = \Image::make($file);

        $image->resize(null, 1000, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($path);







        $picture = new Picture;
        $picture->place_id = $request->place_id;
        $picture->title = 'default';
        $picture->image = 'uploads/' . $fileNewName;
        // $picture->image = $path;
        $picture->save();

        return redirect()->route('admin.picture.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laravel\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravel\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laravel\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        File::delete(storage_path('app/public/' . $picture->image));
        $picture->delete();
        return redirect()->route('admin.picture.index');
    }
}
