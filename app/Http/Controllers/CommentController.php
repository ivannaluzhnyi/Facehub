<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function validator(array $data)
    {
        return Validator::make($data, [
            'content' => ['required', 'string'],
        ]);
    }

    public function create (Request $request) {

        $comment = new Comment();

        if($request->input('anonyme')){
            $comment->anonyme = $request->input('anonyme');
        } else {
            $comment->anonyme = 'false';
        }
        $comment->content = $request->input('content');
        $comment->post_id = (int)$request->input('post_id');
        $comment->user_id = 1; /// Auth::id();
        $comment->save();

//        dd(Slug::where('id', $request->input('slug_id') )->first()->name );

        return  redirect( asset(Slug::where('id', $request->input('slug_id') )->first()->name ));

    }

}
