<?php

namespace App\Http\Controllers;

use App\Terms;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $published_terms = Terms::published()->orderBy('published_at','desc')->get();
        $unpublished_terms = Terms::unpublished()->latest()->get();
        return view('terms.index',[
            'published_terms' => $published_terms,
            'unpublished_terms' => $unpublished_terms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters =$request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|min:50',
        ]);
        $parameters['published_at'] = null;
        $newTerm = Terms::create($parameters);
        if($newTerm){
            $request->session()->flash('message', 'New terms successfully added!');
        }
        return redirect()->route('terms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Terms  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Terms $term)
    {
        return view('terms.show')->withTerm($term);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Terms  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Terms $term)
    {
        return view('terms.edit')->withTerm($term);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Terms  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terms $term)
    {
        $parameters =$request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|min:50',
        ]);
        $term->update($parameters);
        return redirect()->route('terms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Terms $term
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Terms $term)
    {
        $term->delete();
        return redirect()->back();
    }

    public function publish(Terms $term){
        $term->published_at = now();
        $term->save();

//        foreach (User::all() as $user){
//            Notification::send($user, new TermsChanged($user));
//        }

        return redirect()->back();
    }

    public function accept(){
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
        if($user){
            $user->terms_accepted_at = now();
            $user->save();
        }

        return redirect()->back();
    }

    public function terms(){
        $term = Terms::recentFirst()->first();
        return view('terms.show')->withTerm($term);
    }
}