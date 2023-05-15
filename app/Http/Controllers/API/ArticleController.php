<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return response()->json(['articles' => $articles]);
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return response()->json(['categories' => $categories]);
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
                return response()->json(['success' => true]);
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

            return response()->json(['success' => false, 'error' => $e->getMessage()]);

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
            return response()->json(['success' => true]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException | \Exception $e) {
            return $e->getMessage();
        }

        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}
