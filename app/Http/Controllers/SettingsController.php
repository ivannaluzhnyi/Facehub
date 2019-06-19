<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SettingsController
{
    public function index()
    {

        return view('settings.index');
    }
}
