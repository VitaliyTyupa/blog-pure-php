<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categ_id = intval(request('category'));
        $categories = DB::table('categories')->select('id', 'categ_name')->get();
        $selected_category = NULL;
        if($categ_id) {
            $articles = Article::where('artic_categ_id_ref', '=', $categ_id)
                ->orderBy('created_at', 'asc')
                ->get();
            $selected_category = DB::table('categories')->findOr($categ_id);
        } else {
            $articles = Article::orderBy('created_at', 'asc')->get();
        }
        
       
        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'selected_category' => $selected_category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->select('id', 'categ_name')->get();

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();

        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'artic_desc' => 'required|min:2',
            'artic_bild' => 'required',
            'artic_tn_bild'=> 'required',
            'artic_categ_id_ref'=> 'required'
        ]);

        $article->name = $validatedData['name'];
        $article->artic_desc = $validatedData['artic_desc'];
        $article->artic_bild = $validatedData['artic_bild'];
        $article->artic_tn_bild = $validatedData['artic_tn_bild'];
        $article->artic_categ_id_ref = $validatedData['artic_categ_id_ref'];
        $article->save();
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::join('categories', 'artic_categ_id_ref', '=', 'categories.id')
            ->select(
                'articles.id',
                'articles.name',
                'articles.artic_desc',
                'articles.artic_bild',
                'articles.created_at',
                'articles.updated_at',
                'categories.categ_name'
                )
            ->where('articles.id', '=', $id)
            ->firstOrFail();
        return view('articles.article-preview', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = DB::table('categories')->select('id', 'categ_name')->get();
        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'artic_desc' => 'required|min:2',
            'artic_bild' => 'required',
            'artic_tn_bild'=> 'required',
            'artic_categ_id_ref'=> 'required'
        ]);

        $article->name = $validatedData['name'];
        $article->artic_desc = $validatedData['artic_desc'];
        $article->artic_bild = $validatedData['artic_bild'];
        $article->artic_tn_bild = $validatedData['artic_tn_bild'];
        $article->artic_categ_id_ref = $validatedData['artic_categ_id_ref'];
        $article->save();
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('articles');
    }
}
