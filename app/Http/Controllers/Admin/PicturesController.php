<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PicturesController extends Controller
{



    public function show($place_id)
    {
        $place = Place::find($place_id);
        $pictures = $place->pictures()->paginate(10);

        return view('admin.pictures.index', ['pictures' => $pictures]);
    }
}
