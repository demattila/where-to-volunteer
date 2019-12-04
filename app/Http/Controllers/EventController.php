<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\EventCategory;
use App\Favorite;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Event $event)
    {
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
//        $events = Event::all();
        $event = $event->newQuery();
        $perPage = 6;

        if ($request->has('region')) {
            $event->where('region', $request->input('region'));
        }

        if ($request->has('category')) {
            $event->whereHas('categories',function($q)use ($request) {
                $q->where('name',$request->input('category'));
            });
        }

        if($request->has('per_page')){
            $perPage=$request->get('per_page');
        }

        $events = $event->paginate($perPage);
        $regions = Region::all()->pluck('name');
        $categories = Category::all()->pluck('name');

        return view('event.index',[
            'events' => $events,
            'regions' => $regions,
            'categories' => $categories,
            'user' => $user ?? null,
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
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
        $categories = Category::all();
        return view('event.create',[
            'user' => $user,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = Validator::make($request->all(), [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|min:10',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'starts_at' => 'required|date|date_format:Y-m-d',
            'ends_at' => 'required|date|date_format:Y-m-d',
            'mission' => 'nullable|string|max:255',
            'reward' => 'nullable|string|max:255',
            'info' => 'nullable|string|max:255',
        ])->validate();
        $parameters['owner_id'] = auth()->guard('web_organization')->user()->id;

        $categories =$request->validate(['categoriesArray' => 'required']);
        $categories = $categories['categoriesArray'];
//        dd($categories);
        $event = Event::create($parameters);
        $id = $event->id;

        foreach ($categories as $category){
            EventCategory::create([
                'event_id' => $id ,
                'category_id' => $category
            ]);
        }
//        return redirect()->route('event.image.edit')->with('new', 'Step Two');
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
