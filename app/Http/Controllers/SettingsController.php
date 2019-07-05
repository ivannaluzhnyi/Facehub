<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Mail\Mailer;
use \Auth;


class SettingsController
{
    public function index()
    {


        return view('settings.index');
    }
    public function image(Request $request)
    {

        if ($request->hasFile('input_img')) {

            $a=Auth::user()->avatar;
            $picture=substr($a,0,-4);
            $image = $request->file('input_img');
            $name = $picture.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/thumbnails/');
            $image->move($destinationPath, $name);
          //  $this->save();


            return back()->with('success','Image Upload successfully');
        }

    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'input_img' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
    }
}
