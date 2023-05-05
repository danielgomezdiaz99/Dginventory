<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
        function __construct()
    {
        $this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index','show']]);
        $this->middleware('permission:article-create', ['only' => ['create','store']]);
        $this->middleware('permission:article-edit', ['only' => ['update']]);
        $this->middleware('permission:article-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('articles.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {

        try{

            $rules = [
                'nombreArticulo' => 'required|string|min:3|max:255',
                'subcategoria' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('articles.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $article = new Article();
            $article->name = $request->input('nombreArticulo');
            $article->subcategory_id = $request->subcategoria;
            $article->available = boolval($request->input('available'));
            $article->visible = boolval($request->input('visible'));
            $article->status = $request->input('estado');
            $article->save();
            return redirect()->route('articles.index');
        } catch (\Exception $e){

            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->{$request->column} = $request->value;
            $article->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {

        try {
            $article = Article::findOrFail($id);
            $response = $article->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException | \Exception $e) {
            return $e->getMessage();
        }

        return ['success' => $response];
    }



}

