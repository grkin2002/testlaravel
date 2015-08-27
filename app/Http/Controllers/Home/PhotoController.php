<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function waterfall(){

        $page_size = 20;
        $photos = \App\Photo::simplePaginate($page_size);


        return view('home.photo.waterfall', compact('photos'));
    }
}
