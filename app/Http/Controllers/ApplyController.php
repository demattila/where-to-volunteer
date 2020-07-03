<?php

namespace App\Http\Controllers;

use App\Event;
use App\Events\ApplyRequest;
use App\Events\ApplyResponse;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Apply;
use RealRashid\SweetAlert\Facades\Alert;

class ApplyController extends Controller
{
    public function index()
    {
//        $applies = Event::find(1);
//        return view('applies', ['applies' => $applies]);
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

        event(new ApplyRequest($event, auth()->user()->name,true));
        $request->session()->flash('message', 'Successfully applied to this event!!');
        return redirect()->back();
    }

    public function cancel(Request $request, Event $event)
    {
        $apply = Apply::where('volunteer_id',auth()->user()->id)->where('event_id', $event->id)->first();
        $apply->delete();

        event(new ApplyRequest($event, auth()->user()->name,false));
        $request->session()->flash('message', 'Successfully canceled!');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Event $event
     * @param Volunteer $volunteer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Request $request, Event $event, Volunteer $volunteer){

        $apply = Apply::where('volunteer_id',$volunteer->id)->where('event_id',$event->id)->first();
        $apply->update([
            'status' => 1,
        ]);

        $alertMessage = $volunteer->name.' has been accepted';
        Alert::success('Accepted!',$alertMessage);
        event(new ApplyResponse($event->title,true,$volunteer->id));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Event $event
     * @param Volunteer $volunteer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, Event $event, Volunteer $volunteer){
        $apply = Apply::where('volunteer_id',$volunteer->id)->where('event_id',$event->id)->first();
        $apply->update([
            'status' => 2,
        ]);

        $alertMessage = $volunteer->name.' has been rejected';
        alert()->error('Rejected!',$alertMessage);
        event(new ApplyResponse($event->title,false,$volunteer->id));

        return redirect()->back();
    }
}
