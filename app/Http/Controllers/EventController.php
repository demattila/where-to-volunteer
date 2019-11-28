<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Favorite;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $events)
    {
        $events = Event::paginate(4);
        $regions = Region::all()->pluck('name');
        $categories = Category::all()->pluck('name');
//      $events = Event::filter($request)->get();
        return view('event.index',[
            'events' => $events,
            'regions' => $regions,
            'categories' => $categories,
        ]);
    }

    public function favorite(Event $event){
        $volunteer_id = Auth::guard('web')->user()->id;
        $event_id = $event->id;
        dump($event->id);
        Favorite::create([
            'volunteer_id' => $volunteer_id,
            'event_id' => $event_id
        ]);
        return redirect()->route('events.index');
    }

    public function unfavorite(Event $event){
        $user_id = Auth::guard('web')->user()->id;
        $favorite = Favorite::where('volunteer_id',$user_id)->where('event_id',$event->id)->first();
//        dump($favorite);
        $favorite->delete();
        return redirect()->route('events.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //dump($event);
        return view('event.details', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
