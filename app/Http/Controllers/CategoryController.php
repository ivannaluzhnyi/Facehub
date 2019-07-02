<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->join('slugs','categories.slug_id','=', 'slugs.id')
            ->select('categories.id', 'categories.name','categories.created_at', 'slugs.name as slug_name')
            ->get();
        return view('categories.index')->with('categories',$categories);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
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

        $category = new Category();
        $category->slug_id = $slug->id;
        $category->user_id = $user_id;
        $category->name = ucfirst($request->input('name'));
        $category->save();

        $request->session()->flash('status_success', 'Catégorie été ajouté');
        return redirect()->route('show_category');
    }

    public function delete(Request $request)
    {
        $category = DB::table('categories')
            ->where('id','=',$request->id)
            ->get();

        if($category[0]->user_id == Auth::id()){
            Category::destroy($request->id);
            $request->session()->flash('status_danger', 'Categorie supprimé');
            return redirect()->route('categories');
        }
        return redirect()->route('show_category');
    }
}
