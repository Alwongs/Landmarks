<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Place;
use App\Comment;
use App\Picture;
use Illuminate\Support\Facades\File;

class WorldController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('title')->get();
        return view('world.home', [
            'countries' => $countries
        ]);
    }

    public function cities($slug = NULL)
    {
        if ($slug) {
            $country = Country::where('slug', $slug)->first();
            return view('world.cities', [
                'country' => $country,
                'cities' => $country->cities()->paginate(10)
            ]);
        } else {
            return view('world.cities', [
                'cities' => City::orderBy('title')->paginate(10)
            ]);
        }
    }

    public function places($slug = NULL)
    {
        if ($slug) {
            $city = City::where('slug', $slug)->first();
            return view('world.places', [
                'city' => $city,
                'places' => $city->places()->paginate(10)
            ]);
        } else {
            return view('world.places', [
                'places' => Place::orderBy('title')->paginate(10)
            ]);
        }
    }

    public function onePlace($slug)
    {
        $place = Place::where('slug', $slug)->first();
        $comments = $place->comments()->orderBy('created_at', 'desc')->paginate(10);
        $pictures = $place->pictures()->orderBy('created_at', 'desc')->get();

        return view('world.onePlace', [
            'place' => $place,
            'comments' => $comments,
            'pictures' => $pictures
        ]);
    }

    public function createPicture(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg|dimensions:min_width=600,min_height=600'
        ]);

        // $path = $request->file('image')->store('uploads', 'public');


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
        $picture->save();



        $place = Place::find($request->place_id);
        $slug = $place->slug;

        return redirect()->route('onePlace', [
            'slug' => $slug
        ]);
    }




    public function openGallery($place_id)
    {
        $place = Place::find($place_id);
        $pictures = $place->pictures()->paginate(1);

        return view('world.pictures.index', [
            'pictures' => $pictures,
            'place' => $place
        ]);
    }
}
