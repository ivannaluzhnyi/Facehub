<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\UploadTrait;
use function Psy\debug;

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
    protected $redirectTo = '/home';

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
        $t = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_of_birth' => ['required', 'string', 'max:255', 'unique:users'],
            'avatar' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        dd($t);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_of_birth' => ['required', 'string', 'max:255', 'unique:users'],
            'avatar' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        dd($data);
//            // Get image file
//            $image = $request->file('avatar');
//            // Make a image name based on user name and current timestamp
//            $name = str_slug($request->input('name')).'_'.time();
//            // Define folder path
//            $folder = '/uploads/images/';
//            // Make a file path where image will be stored [ folder path + file name + file extension]
//            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
//            $this->uploadOne($image, $folder, 'public', $name);


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => '',
            'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
