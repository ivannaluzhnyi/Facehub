<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create (Request $request) {
        dd($request);

//        return redirect()->route('posts.show', ['slug' => $comment->post->slug])->with('success', 'Thanks for your comment');
    }

}
