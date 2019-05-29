<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use \Auth;

class WallController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('wall.index')->withMessages($messages);
    }

    public function write(Request $request)
    {
        $message = new Message;
        $message->message = $request->input('message');
        $message->id_author = Auth::id();
        $message->save();
        return redirect()->route('wall');
    }

    public function delete(Request $request)
    {
        $message = Message::find($request->id_message);
        if($message->id_author == Auth::id()){
            $message->delete();
            // Message::destroy($request->id_message)
            $request->session()->flash('message', 'Message deleted');
            return redirect()->route('wall');
        }
        $request->session()->flash('message', 'Illegal operation !');
        return redirect()->route('wall');
    }
}
