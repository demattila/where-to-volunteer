<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
        else{
            $user = null;
        }
        if($user){
            $parameters = Validator::make($request->all(), [
                'event' => ['required'],
                'message' => ['required','string', 'max:255']
            ])->validate();

            $message = [
                'owner_id' => $user->id,
                'event_id' => $parameters['event'],
                'description' =>$parameters['message'],
            ];

            Message::create($message);
        }

        session()->flash('message','Message sent!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response(200);
    }
}
