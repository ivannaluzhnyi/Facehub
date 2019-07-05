<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Slug;
use App\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    private $per_page = 5;

    public function index()
    {
        $posts = Post::with('category', 'user')->paginate($this->per_page);
        return view('posts.index', compact('posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->where('category_id', $category->id)->paginate($this->per_page);
        return view('posts.index', compact('posts', 'category'));
    }

    public function user($user_id)
    {
        $user = User::find($user_id);
        $posts = Post::with('category', 'user')->where('user_id', $user->id)->paginate($this->per_page);
        return view('posts.index', compact('posts', 'user'));
    }

    public function show($slug)
    {
        $categories = DB::table('categories')
            ->join('slugs','categories.slug_id',"=",'slugs.id')
            ->select('categories.id','categories.name','categories.created_at', 'categories.user_id','slugs.name as slug_name') ->get();
        $slug = Slug::where('name', $slug)->first();
        if($slug === null) return redirect('/');
        $post = Post::where('slug_id',$slug->id)->first();

//        $comment = Comment::where('post_id',$post->id)->get();

        $comment = DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->select('comments.id','comments.content','comments.created_at','comments.anonyme','users.name as user_name')
            ->where('comments.post_id', '=',$post->id)
            ->get();


        $user = User::where('id',$post->user_id)->first();
//        $comment = new Comment(['post_id' => $post->id]);
        return view('posts.show')->with('categories',$categories)->with('post',$post)->with('user',$user)->with('comments', $comment);
    }

}
