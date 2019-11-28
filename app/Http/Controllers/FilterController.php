<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Region;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request, Event $event){
        $event = $event->newQuery();

        // Search for a user based on their name.
        if ($request->has('city')) {
            $event->where('city', $request->input('city'));
        }

        // Search for a user based on their company.
        if ($request->has('region')) {
            $event->where('region', $request->input('region'));
        }

        // Search for a user based on their city.
        if ($request->has('category')) {
            $event->whereHas('categories',function($q)use ($request) {
                $q->where('name',$request->input('category'));
            });
        }
        $events = $event->paginate(4);
        $regions = Region::all()->pluck('name');
        $categories = Category::all()->pluck('name');
        return view('event.index',[
            'events' => $events,
            'regions' => $regions,
            'categories' => $categories,
        ]);
    }
}
