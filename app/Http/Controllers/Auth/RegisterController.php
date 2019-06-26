<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
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
    protected $redirectTo = '/';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_of_birth' => ['required', 'string', 'max:255', 'unique:users'],
            'avatar' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $this->validator(array($request));
//
//


        $img_dir = '';
        if($request->hasFile('avatar')){

            $originalImage= $request->file('avatar');
            $fileName = rand(1111,9999).time().'.'.$originalImage->getClientOriginalExtension();
            $org_path = 'images/originals/' . $fileName;
            $thm_path = 'images/thumbnails/' . $fileName;

            Image::make($originalImage->getRealPath())->fit(900, 500, function ($constraint) {
                $constraint->upsize();
            })->save($org_path);

            Image::make($originalImage->getRealPath())->fit(270, 160, function ($constraint) {
                $constraint->upsize();
            })->save($thm_path);

            $img_dir = $fileName;
        }

         User::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'avatar' => $img_dir,
             'date_of_birth' => $request['date_of_birth'],
             'password' => Hash::make($request['password']),
         ]);

        return redirect()->back()->with(['status' => 'Utilisateur ajouté.']);
    }
}
