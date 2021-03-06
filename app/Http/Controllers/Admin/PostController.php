<?php

namespace App\Http\Controllers\Admin;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Auth;
use Redirect;
use View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($bid)
    {

        return view('admin.post.create')->with('bid', $bid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $bid)
    {

        $input = Request::all();
        $input['board_id'] = $bid;
        $input['user_id'] = Auth::user()->id;

        \App\Post::create($input);
        return Redirect::route('PostList', ['bid'=>$bid] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit( $bid, $post)
    {

        return View::make('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update( $bid, $post)
    {
        $post->update(Request::all());
        return   Redirect::route('PostList', ['bid'=>$bid] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($bid, $post)
    {
        $post->delete();
        return Redirect::route('PostList', ['bid'=>$bid]);
    }
}
