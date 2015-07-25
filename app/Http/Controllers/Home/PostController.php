<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_size = 6;
        $posts = \App\Post::where('board_id',2)
                        // ->where('status',0)
                        ->with('replies','user')
                        ->latest()
                        ->paginate($page_size);
        return view('home.post.index',compact('posts'));
    }


    public function show()
    {
        //
    }
}
