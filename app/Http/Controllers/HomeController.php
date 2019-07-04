<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->join('slugs','categories.slug_id',"=",'slugs.id')
            ->select('categories.id','categories.name','categories.created_at', 'categories.user_id','slugs.name as slug_name') ->get();
        $posts = DB::table('posts')
            ->join('slugs','posts.slug_id',"=",'slugs.id')
            ->join('categories','posts.category_id',"=",'categories.id')
            ->join('users','posts.user_id',"=",'users.id')
            ->select('posts.id','posts.name','posts.img','posts.content','slugs.name as slug_name','users.name as user_name', 'categories.name as categories_name','posts.created_at')
            ->get();

        return view('home')->with('categories',$categories)->with('posts',$posts);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string' ],
            'slug' => ['required', 'string', 'max:255', 'unique:slugs'],
        ]);
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $this->validator(array($request));

        $slug = new Slug();
        $slug->name = strtolower($request->input('slug'));
        $slug->user_id = $user_id;
        $slug->save();

        $img_dir = '';
        if($request->hasFile('file')){

            $originalImage= $request->file('file');
            $fileName = rand(1111,9999).time().'.'.$originalImage->getClientOriginalExtension();
            $org_path = 'upload_posts/' . $fileName;

            Image::make($originalImage->getRealPath())->fit(900, 500, function ($constraint) {
                $constraint->upsize();
            })->save($org_path);

            $img_dir = $fileName;
        }

        $post = new Post();
        $post->content = $request->input('content');
        $post->name = $request->input('title');
        if($request->input('category') !== "null"){
            $post->category_id = $request->input('category');
        }
        $post->slug_id = $slug->id;
        $post->img = $img_dir;
        $post->user_id = $user_id;
        $post->save();

        $request->session()->flash('status_success', 'Post été ajouté');
        return redirect()->route('home');
    }
}
