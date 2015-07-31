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


    public function show( $bid, $pid)
    {
        //view count plus 1
        //
        //only find by pid, if you want to  throw an exception if not found, pls use firstOrFail()
        $post = \App\Post::find($pid);
        $post->view_amount++;
        $post->update();
        return view('home.post.show', compact('post'));
    }
}
