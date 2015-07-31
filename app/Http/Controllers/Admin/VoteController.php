<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{

    //receive ajax call agree
    public function agree(){
        return response('100');
    }

    //receive ajax call oppose
    public function oppose(){
        return response('101');
    }

    //receive ajax call neutral
    public function neutral(){
        return response('102');
    }


}
