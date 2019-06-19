<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProfilController
{
    public function index()
    {

        return view('settings.index');
    }
}
