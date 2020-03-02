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
//        if(auth()->guard('web')->check()){
//            $user = auth()->guard('web')->user();
//        }
//        if(auth()->guard('web_organization')->check()){
//            $user = auth()->guard('web_organization')->user();
//        }
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

        $events = $event->orderBy('id','desc')->paginate($perPage);
//        $regions = Region::all()->pluck('name');
//        $categories = Category::all()->pluck('name');

        return view('event.index',[
            'events' => $events,
//            'regions' => $regions,
//            'categories' => $categories,
//            'user' => $user ?? null,
        ]);
    }

    public function fetch(Request $request)
    {
//        dd($request->get('query'));
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Event::where('title', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu list" style="display:block; position:relative">';
            foreach($data as $event)
            {
                $id = $event->id;
                $output .= '<li class="option"><a href="/events/'.$id.'">'.$event->title.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function fav(Request $request){
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
        if($request->get('item_id')){
            $event = Event::findOrFail($request->get('item_id'));
//            Favorite::create([
//                'volunteer_id' => $user,
//                'event_id' => $event
//            ]);
            $user->favorites()->attach($event);
        }
        return null;
    }

    public function unfav(Request $request){
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
        if($request->get('item_id')){
            $event = Event::findOrFail($request->get('item_id'));
            $user->favorites()->detach($event);
        }
        return null;
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
        return view('event.create');
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
        return redirect()->route('event.image.edit',['event' => $event])->with('isRedirected',1);
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

    public function orgOngoingDetails(Event $event){
        $ongoing_count = $event->ongoingApplies()->count();
        $accepted_count = $event->acceptedApplies()->count();
        $rejected_count = $event->rejectedApplies()->count();
        return view('organization.ongoing_details',[
            'event' => $event->load('applies'),
            'ongoing_count' => $ongoing_count,
            'accepted_count' => $accepted_count,
            'rejected_count' => $rejected_count
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit')->withEvent($event);
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
        $parameters =$request->validate([
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
        ]);

        $categories =$request->validate(['categoriesArray' => 'required']);
        $categories = $categories['categoriesArray'];

//        $id = $event->id;
//        foreach ($categories as $category){
//            EventCategory::create([
//                'event_id' => $id ,
//                'category_id' => $category
//            ]);
//        }
        $event->categories()->syncWithoutDetaching($categories);

        $event->update($parameters);

        $request->session()->flash('message', 'Successfully updated the event!');
        return redirect()->route('events.show',['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Event $event)
    {
      $event->delete();

        $request->session()->flash('message', 'Successfully deleted the event!');
        return redirect()->back();
    }
}
