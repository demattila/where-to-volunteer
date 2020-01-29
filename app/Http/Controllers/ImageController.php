<?php

namespace App\Http\Controllers;

use App\Event;
use App\Story;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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

    public function store_event(Request $request,Event $event)
    {
        $new_image = $event->addMedia($request->image)->toMediaCollection('event_profile_images');
        $event->update(['image_id' => $new_image->id]);

//        dump($request->has('isRedirected'));

        if($request->get('isRedirected')){
            $request->session()->flash('message', 'New event successfully created! Look at your events!');
            return redirect()->route('organization.dashboard');
        }

        $request->session()->flash('message', 'Successfully uploaded the image!');
        return redirect()->back();
    }
    public function store_story(Request $request,Story $story)
    {
        $new_image = $story->addMedia($request->image)->toMediaCollection('story_image');
        $story->update(['image_id' => $new_image->id]);


        $request->session()->flash('message', 'Successfully uploaded the image!');
        return redirect()->back();
    }
    public function store_story_additional(Request $request,Story $story){
        $images = $story->getMedia('story_additional_images');
        if($images->count() >= 2){
            $request->session()->flash('error', 'Only 2 additional images are allowed!');
            return redirect()->back();
        }
        $story->addMedia($request->image)->toMediaCollection('story_additional_images');
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
        $user=auth()->guard('web')->user();
//        dump(auth()->guard('web_organization')->check());
//        dump(auth()->guard('web')->check());
//        dump($type);
        if(auth()->guard('web_organization')->check()){
            $user= auth()->guard('web_organization')->user();
            $type='organization';
        }
        return view('shared.edit_image',[
            'user' => $user,
            'type' => $type
        ]);
    }

    public function event_edit(Event $event){
        return view('event.edit_image',[
            'event' => $event
        ]);
    }
    public function story_edit(Story $story){
        return view('stories.edit_image',[
            'story' => $story
        ]);
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
        $media->delete();
        $request->session()->flash('message', 'Successfully deleted the image!');
        return redirect()->back();
    }

    public function destroy_story(Request $request,Story $story){
        $story->clearMediaCollection('story_additional_images');
        $request->session()->flash('message', 'Additional images successfully deleted!');
        return redirect()->back();
    }
}
