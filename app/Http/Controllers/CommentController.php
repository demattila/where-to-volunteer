<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Story;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Story $story
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Story $story)
    {
//        dd($request->url());
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
            $type = 'App\Volunteer';
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
            $type = 'App\Organization';
        }

        $parameters = $request->validate([
            'text' => 'required|min:2|max:255',
        ]);

        $parameters['story_id'] = $story->id;
        $parameters['owner_id'] = $user->id;
        $parameters['owner_type'] = $type;

        Comment::create($parameters);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
