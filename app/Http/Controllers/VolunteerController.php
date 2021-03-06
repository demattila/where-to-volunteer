<?php

namespace App\Http\Controllers;

use App\Story;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{
    public function index()
    {
        $latestStories = Story::orderBy('created_at','desc')->limit(3)->get();

        return view('volunteer.index',[
            'latestStories' => $latestStories
        ]);

    }

    public function dashboard()
    {
        return view('volunteer.dashboard' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $volunteer = Auth::guard('web')->user();
        return view('volunteer.edit',['user' => $volunteer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request){

        $update = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'posy' => ['nullable','string', 'max:255'],
            'mobile' => ['nullable','string','min:5' ,'max:20'],
            'city' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'works_at' => ['nullable','string', 'max:255'],
            'birth' => ['required','date','date_format:Y-m-d'],
//          'image' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'sex' => ['required'],
            'driving_licence' => ['required'],
        ])->validate();

        $update = [
            'name' => $request->name,
            'posy' => $request->posy,
            'mobile' =>$request->mobile,
            'city' =>$request->city,
            'region' =>$request->region,
            'works_at' =>$request->works_at,
            'birth' =>$request->birth,
            'sex' =>$request->sex,
            'driving_licence' => ($request['driving_licence'] == 'true') ? 1 : 0,
        ];

        Volunteer::find(auth()->user()->id)->update($update);

        $request->session()->flash('message', 'Successfully updated your profile!');
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $user = auth()->guard('web')->user();
        if($user){
            $user->delete();
        }
        return redirect('/');
    }
}
