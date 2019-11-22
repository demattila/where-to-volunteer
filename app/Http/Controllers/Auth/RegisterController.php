<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;
use App\Volunteer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    use UploadTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:volunteers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'posy' => ['nullable','string', 'max:255'],
            'mobile' => ['nullable','string','min:5' ,'max:20'],
            'city' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'works_at' => ['nullable','string', 'max:255'],
            'birth' => ['required','date','date_format:Y-m-d'],
//            'image' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'sex' => ['required'],
            'driving_licence' => ['required'],
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
//        dump($data);
//        if($data['image']===NULL){
//            $image='default.png';
//        }else{
//            $image=$data['image'];
//            $name =time();
//            $folder = '/img/volunteer/';
//            $filePath =$name. '.' . $image->getClientOriginalExtension();
//            $this->uploadOne($image, $folder, 'public', $name);
//        }

//        dd($data['sex']);
        return Volunteer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'posy' => $data['posy'],
            'mobile' => $data['mobile'],
            'city' => $data['city'],
            'region' => $data['region'],
            'works_at' => $data['works_at'],
            'birth' => $data['birth'],
//            'image' => $filePath
            'sex' => $data['sex'],
            'driving_licence' => ($data['driving_licence'] == 'true') ? 1 : 0,
        ]);
    }
}
