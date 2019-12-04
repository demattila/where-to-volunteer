<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{

    public function index()
    {
//        dump('User vol: '.Auth::guard('web')->user());
//        dump('User org: '.Auth::guard('web_organization')->user());
//        dump(Auth::guard('web')->check());
//        if(Auth::guard('web')->check() ){
////            redirect()->;
//            return redirect()->route('dashboard');
//        }
//        else{
//            return view('index');
//        }
        return view('volunteer.index');

    }

    public function dashboard()
    {
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }else{
            $user = null;
        }

        return view('volunteer.dashboard',['user' => $user] );
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
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
//        dump(Auth::guard('web')->user());
        return view('volunteer.edit',['user' => $volunteer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        $request->validate([
//            'name' => 'required|min:3|max:255',
//            'description' => 'required|min:3|max:255',
//        ]);
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
        //
    }
}
