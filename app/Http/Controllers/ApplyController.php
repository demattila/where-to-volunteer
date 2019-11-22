<?php

namespace App\Http\Controllers;

use App\Event;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Apply;

class ApplyController extends Controller
{
    public function index()
    {
//        $applies = Event::find(1);
//        return view('applies', ['applies' => $applies]);
    }

    public function store(Request $request)
    {


    }

    public function apply(Request $request,Event $event)
    {

        if(auth()->user()->isApplied($event)){
            $request->session()->flash('message', 'You are already applied!');
            return redirect()->back();
        }

        $apply = new Apply();
        $apply->volunteer_id = auth()->id();
        $apply->event_id = $event->id;
        $apply->status = 0;
        $apply->save();

        $request->session()->flash('message', 'Successfully applied to this event!!');
        return redirect()->back();
    }

    public function cancel(Request $request, Event $event)
    {
        $apply = Apply::where('volunteer_id',auth()->user()->id)->where('event_id', $event->id)->first();
        $apply->delete();
        $request->session()->flash('message', 'Successfully canceled!');

        return redirect()->back();
    }
}
