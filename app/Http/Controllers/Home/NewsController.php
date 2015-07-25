<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_size = 4;
        $newses = \App\Post::where('board_id',1)
                            // ->where('status',0)
                            ->paginate($page_size);
        return view('home.news.index',compact('newses'));
    }


}
