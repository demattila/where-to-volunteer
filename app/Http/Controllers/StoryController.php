<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $popularStories= Story::withCount('views')->orderBy('views_count','desc')->limit(3)->get();

        if ($request->has('q')) {
            $q = request()->get ( 'q' );
            $stories = Story::where ( 'title', 'LIKE', '%' . $q . '%' )->withCount('comments')->withCount('views')->paginate(1);
            if (count ( $stories ) > 0)
                return view ('stories.index')->withStories($stories)->withPopularStories($popularStories);
            else
                return view ( 'stories.index' )->withMessage ( 'No Details found. Try to search again !' );
        }

        $stories = Story::withCount('comments')->withCount('views')->paginate(5);
        return view('stories.index',[
            'stories' => $stories,
            'popularStories' => $popularStories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
            $type = 'App\Volunteer';
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
            $type = 'App\Organization';
        }

        $parameters = Validator::make($request->all(), [
            'title' => 'required|string|min:3|max:255',
            'text_short' => 'required|string|max:255',
            'quote' => 'required|string|max:255',
            'text' => 'required|min:200',
        ])->validate();

        $id = $user->id;
        $parameters['owner_id'] = $id;
        $parameters['owner_type'] = $type;
        Story::create($parameters);

        $request->session()->flash('message', 'New story posted successfully!');
        return redirect()->route('stories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {

        views($story)->record();
        $popularStories= Story::withCount('views')->orderBy('views_count','desc')->limit(3)->get();

//        dd($story->comments()->count());
        return view('stories.details', [
            'story' => $story->load('comments'),
            'popularStories' =>$popularStories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return view('stories.edit')->withStory($story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $parameters =$request->validate([
            'title' => 'required|string|min:3|max:255',
            'text_short' => 'required|string|max:255',
            'text' => 'required|min:200',
            'quote' => 'required|string|max:255'
        ]);

        $story->update($parameters);

        $request->session()->flash('message', 'Successfully updated the story!');
        return redirect()->route('stories.show',['story' => $story]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //
    }
}
