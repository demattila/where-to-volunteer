<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Volunteer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all();
        $organizations = Organization::all();
        return view('admin.manage_users', [
            'volunteers' => $volunteers,
            'organizations' => $organizations
        ]);
    }

    public function destroy(string $type, int $id)
    {
        if($type === 'volunteer'){
            $user = Volunteer::findOrFail($id);
            if($user){
                $user->delete();
//                $request->session()->flash('message', 'User deleted successfully!');
            }
        }
        if($type === 'organization'){
            $user = Organization::findOrFail($id);
            if($user){
                $user->delete();
//                $request->session()->flash('message', 'User deleted successfully!');
            }
        }

        return redirect()->back();
    }
}
