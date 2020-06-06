<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        //egy messages db table: id,organizationID,eventID,Message,datek s ennyi
        //a lehetne realtime-ban ha megjon a pusher ertesites akkor meghivjon egy fuggvenyt, ami
        // ajaxxal jqueryvel frissiti az uzeneteket mondjuk
        //Esetleg pusher ? :D


        session()->flash('message','Message sent!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
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
