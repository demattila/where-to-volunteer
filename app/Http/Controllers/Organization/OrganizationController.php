<?php

namespace App\Http\Controllers\Organization;

use App\Organization;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(Auth::guard('web_organization')->check() ){
//            return redirect()->route('organization.dashboard');
//        }
//        else{
//            return view('organization.index');
//        }
        $latestStories = Story::orderBy('created_at','desc')->limit(3)->get();
        return view('organization.index')->with('latestStories',$latestStories);
    }

    public function dashboard()
    {
//        $user = auth()->guard('web_organization')->user();
        return view('organization.dashboard');
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
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        $user = Auth::guard('web_organization')->user();
        return view('organization.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::guard('web_organization')->user();

        $parameters = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'contact_person' => ['required','string','min:3','max:255'],
            'description' => ['nullable','min:3','max:1000'],
            'founded_at' => ['required','date','date_format:Y-m-d'],
            'address' => ['nullable','string', 'max:255'],
            'city' => ['required','string','min:3', 'max:255'],
            'region' => ['required','string','min:3', 'max:255'],
            'mobile' => ['required','string','min:6', 'max:20'],
            'site' => ['nullable','string', 'max:255'],
            'type' => ['required'],
        ])->validate();

        $update = [
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'description' => $request->description,
            'founded_at' => $request->founded_at,
            'address' => $request->address,
            'city' => $request->city,
            'region' => $request->region,
            'mobile' => $request->mobile,
            'site' => $request->site,
            'type_id' => $request->type,

        ];
        if(!$update['description']){
            $update['description'] = $user->description;
        }

        $user->update($update);

        $request->session()->flash('message', 'Successfully updated your profile!');
        return redirect('/organization/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $user = auth()->guard('web_organization')->user();
        if($user){
            $user->delete();
        }
        return redirect('/');
    }


}
