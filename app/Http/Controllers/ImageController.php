<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class ImageController extends Controller
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
        if(auth()->guard('web')->check()){
            $user= auth()->guard('web')->user();
            $new_image = $user->addMedia($request->image)->toMediaCollection('volunteer_profile_images');

        }
        if(auth()->guard('web_organization')->check()){
            $user= auth()->guard('web_organization')->user();
            $new_image = $user->addMedia($request->image)->toMediaCollection('organization_profile_images');

        }
        $user->update(['image_id' => $new_image->id]);

        $request->session()->flash('message', 'Successfully uploaded the image!');
        return redirect()->back();
    }

    public function event_store(Request $request,Event $event)
    {
        $new_image = $event->addMedia($request->image)->toMediaCollection('event_profile_images');
        $event->update(['image_id' => $new_image->id]);

        $request->session()->flash('message', 'Successfully uploaded the image!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $type='volunteer';
        $user=auth()->user();
//        dump(auth()->guard('web_organization')->check());
//        dump(auth()->guard('web')->check());
//        dump($type);
//        if(auth()->guard('web_organization')->check()){
//            $user= auth()->guard('web_organization')->user();
//            $type='organization';
//        }
        return view('shared.edit_image',[
            'user' => $user,
            'image' => $user->image_url,
            'type' => $type
        ]);
    }

    public function event_edit(){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
//        dd($id);
        $media = Media::find($id);
        try {
            $media->delete();
        } catch (\Exception $e){}
        $request->session()->flash('message', 'Successfully deleted the image!');
        return redirect()->back();
    }
}
