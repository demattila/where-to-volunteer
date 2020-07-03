<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function filter($value)
    {
        $badwords = DB::table('bad_words')->get();
        $words = [];
        $replace = [];
        foreach ($badwords as $badword) {
            array_push($words, $badword->word);
            array_push($replace, $badword->replacement);
        }
        return str_ireplace($words, $replace, $value);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Story $story
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Story $story)
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
        $parameters['text'] = $this->filter($parameters['text']);
        $parameters['story_id'] = $story->id;
        $parameters['owner_id'] = $user->id;
        $parameters['owner_type'] = $type;

        Comment::create($parameters);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
