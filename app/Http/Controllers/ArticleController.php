<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::orderByDesc('created_at')->paginate(10);

        return view('admin.layouts.articles.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()->whereNotNull('parent_id')->pluck('name', 'id')->all();

        return view('admin.layouts.articles.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('img_arti');

        if ($request->hasFile('img_arti')) {
            $img_Upload = Storage::putFile('Img/img-post', $request->file('img_arti'));
            $data['img_arti'] = 'storage/' . $img_Upload;
        }
        Article::query()->create($data);

        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.layouts.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $category = Category::query()->whereNotNull('parent_id')->pluck('name', 'id')->all();

        return view('admin.layouts.articles.edit', compact('category', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->except('img_arti');

        if ($request->input('is_featured') == null) {
            $data['is_featured'] = null;
        }
        if ($request->hasFile('img_arti')) {
            $img_upload = Storage::putFile('Img/img-post', $request->file('img_arti'));
            $data['img_arti'] = 'storage/' . $img_upload;
        }
        $old_Img = $article->img_arti;

        $article->update($data);
        if ($request->hasFile('img_arti') && $old_Img && file_exists($old_Img)) {
            unlink(public_path($old_Img));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        if ($article->img_arti && file_exists(($article->arti))) {
            unlink(public_path($article->arti));
        }

        return back();
    }
}
