<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
// use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {
        $categorys      = Category::with('children')->whereNull('parent_id')->get();
        $article        = Article::orderByDesc('created_at')->limit(2)->get();
        $articleViews   = Article::orderByDesc('views')->limit(4)->get();
        $articleRandom  = Article::orderBy('created_at', 'desc')->take(13)->get();

        return view("client.home", compact('article', 'articleViews', 'articleRandom', 'categorys'));
    }

    public function loadCategory(Category $category)
    {
        $categorys      = Category::with('children')->whereNull('parent_id')->get();
        $categoryData   = Category::where('id', $category->id)->with('children')->first();
        $articles       = Category::find($category->id)->articleCategory()->latest()->paginate(10);
        $articleAll     = Category::where('id', $category->id)->with("children", "articleCategory")->get();

        return view("client.chitietdanhmuc", compact('categoryData', 'articles', 'articleAll', 'categorys'));
    }

    public function loadOneCategory(Category $category)
    {
        $articleAll     = [];
        $categorys      = Category::with('children')->whereNull('parent_id')->get();
        $categoryData   = Category::where('id', $category->id)->with('children')->first();
        $articles       = Category::find($category->id)->articles()->latest()->paginate(10);
        $articleViews   = Article::where('category_id', $category->id)->orderByDesc('views')->limit(10)->get();

        return view("client.chitietdanhmuc", compact("categorys", "categoryData", "articles", "articleAll", "articleViews"));
    }
    public function loadArticle(Article $article)
    {
        $categorys       = Category::with('children')->whereNull('parent_id')->get();
        $conten          = Article::where("id", $article->id)->with(['category', 'user'])->first();
        $category        = $article->category()->first()->parent()->first();
        $relatedArticles = Article::where([['category_id', $article->category_id], ['id', "<>", $article->id]])->latest()->limit(5)->get();

        return view("client.chitiettin", compact("categorys", "conten", "category", "relatedArticles"));
    }

    public function search(Request $request)
    {
        // $Article = [];
        $categorys  = Category::with('children')->whereNull('parent_id')->get();

        $inputValue = $request->old('nameArticle', $request->input('nameArticle'));
        $inputTime  = $request->old('time', $request->input('time'));
        $inputCate  = $request->old('category', $request->input('category'));


        $nameArticle = $request->input('nameArticle');
        $time       = $request->input('time');
        $cateSearch = $request->input('category');

        if ($time == 'day') {
            $timeAgo = Carbon::now()->subDay();
        } elseif ($time == 'week') {
            $timeAgo = Carbon::now()->subWeek();
        } elseif ($time == 'month') {
            $timeAgo = Carbon::now()->subMonth();
        } elseif ($time == 'year') {
            $timeAgo = Carbon::now()->subYear();
        }

        if ($cateSearch != null && $time != null) {
            $article = Category::find($cateSearch)
                ->articleCategory()
                ->where('articles.title', 'like', '%' . $nameArticle . '%')
                ->whereBetween('articles.created_at', [$timeAgo, Carbon::now()])
                ->latest()
                ->get();
        } elseif ($cateSearch == null && $time != null) {
            $article = Article::where('articles.title', 'like', '%' . $nameArticle . '%')
                ->whereBetween('articles.created_at', [$timeAgo, Carbon::now()])
                ->latest()
                ->get();
        } elseif ($cateSearch != null && $time == null) {
            $article = Category::find($cateSearch)
                ->articleCategory()
                ->where('articles.title', 'like', '%' . $nameArticle . '%')
                ->latest()
                ->get();
        } else {
            $article = Article::where('articles.title', 'like', '%' . $nameArticle . '%')
                ->latest()
                ->get();
        }

        return  view("client.timkiem", compact("categorys", "article", "inputValue", "inputTime", "inputCate"));
    }
}
