<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Http\Controllers\Controller;
use App\Organization;
use App\Volunteer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/organization';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web_organization');
    }

    public function showRegistrationForm()
    {
        return view('organization.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:organizations'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact_person' => ['required','string', 'max:255'],
            'description' => ['nullable','string', 'max:255'],
            'founded_at' => ['required','date','date_format:Y-m-d'],
            'address' => ['nullable','string', 'max:255'],
            'city' => ['required','string', 'max:255'],
            'region' => ['required','string', 'max:255'],
            'site' => ['nullable','string', 'max:255'],
            'type' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Volunteer
     */
    protected function create(array $data)
    {
        return Organization::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contact_person' => $data['contact_person'],
            'description' => $data['description'],
            'founded_at' => $data['founded_at'],
            'address' => $data['address'],
            'city' => $data['city'],
            'region' => $data['region'],
            'site' => $data['site'],
            'type_id' => $data['type']
        ]);
    }

    protected function guard()
    {
        return auth()->guard('web_organization');
    }
}
