<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController
{
    public function index()
    {
        return view('settings.index');
    }
    public function image(Request $request)
    {

        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = $filePath;
        }
    }
}
