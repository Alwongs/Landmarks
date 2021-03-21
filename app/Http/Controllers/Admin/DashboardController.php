<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use App\Place;
use App\Comment;
use App\Picture;


class DashboardController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('admin.dashboard', [
            'countries' => Country::lastCountries(5),
            'cities' => City::lastCities(5),
            'places' => Place::lastPlaces(4),
            'comments' => Comment::lastComments(4),
            'pictures' => Picture::lastPictures(3),
            'countryCount' => Country::count(),
            'cityCount' => City::count(),
            'placeCount' => Place::count(),
            'commentCount' => Comment::count(),
            'pictureCount' => Picture::count(),
        ]);
    }
}
