<?php

namespace App\Http\Controllers;

use App\Events\UpdateView;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {

        $categorys      = Category::with('children', 'articleCategory')->whereNull('parent_id')->get();
        $article        = Article::orderByDesc('created_at')->limit(2)->get();
        $articleViews   = Article::orderByDesc('views')->limit(4)->get();
        $articleRandom  = Article::orderBy('created_at', 'desc')->take(13)->get();
        $articleHot     = Article::where('is_featured', 1)->latest()->limit(1)->first();
        return view(
            "client.home",
            compact(
                'article',
                'articleHot',
                'articleViews',
                'articleRandom',
                'categorys'
            )
        );
    }

    public function loadCategory(Category $category)
    {
        $categorys      = Category::with('children')->whereNull('parent_id')->get();
        $data           = Category::where('id', $category->id)->with('children', 'articles', 'articleCategory')->first();

        $articleAll     = Category::where('id', $category->id)->with("children", "articleCategory")->get();
        $articleViews   = Article::where('category_id', $category->id)->orderByDesc('views')->limit(10)->get();

        if ($data->children()->first() == null) {
            $categoryData = $data->parent()->first()->with('children')->find($data->parent->id);
        } else {
            $categoryData = $data->with('children')->find($category->id);
        }

        if ($data->articles()->first() == null) {
            $articles = $data->articleCategory()->latest()->paginate(10);
        } else {
            $articles = $data->articles()->latest()->paginate(10);
        }

        // dd($data ->parent);
        return view(
            "client.chitietdanhmuc",
            compact(
                'categoryData',
                'data',
                'articles',
                'articleAll',
                'categorys',
                'articleViews',
                'category'
            )
        );
    }

    public function loadArticle(Article $article)
    {
        // dd($article);
        event(new UpdateView($article));
        $categorys       = Category::with('children')->whereNull('parent_id')->get();
        $conten          = Article::where("id", $article->id)->with(['category', 'user'])->first();
        $category        = $article->category()->first()->parent()->first();
        $relatedArticles = Article::where([['category_id', $article->category_id], ['id', "<>", $article->id]])->latest()->limit(5)->get();

        return view(
            "client.chitiettin",
            compact(
                "categorys",
                "conten",
                "category",
                "relatedArticles"
            )
        );
    }

    public function search(Request $request)
    {
        $categorys  = Category::whereNull('parent_id')->get();

        $nameArticle = $request->old('nameArticle', $request->input('nameArticle'));
        $time        = $request->old('time', $request->input('time'));
        $cateSearch  = $request->old('category', $request->input('category'));

        if ($time == 'day') {
            $timeAgo = Carbon::now()->subDay();
        } elseif ($time == 'week') {
            $timeAgo = Carbon::now()->subWeek();
        } elseif ($time == 'month') {
            $timeAgo = Carbon::now()->subMonth();
        } elseif ($time == 'year') {
            $timeAgo = Carbon::now()->subYear();
        } else {
            $timeAgo = [];
        }

        $article = Article::query()
            ->when($cateSearch, function ($query, $cateSearch) {
                $category_ids = Category::where('parent_id', $cateSearch)->pluck('id');
                return $query->whereIn('category_id', $category_ids);
            })
            ->when($nameArticle, function ($query, $nameArticle) {
                return $query->where('articles.title', 'like', '%' . $nameArticle . '%');
            })
            ->when($timeAgo, function ($query, $timeAgo) {
                return $query->whereBetween('created_at', [$timeAgo,  Carbon::now()]);
            })
            ->latest()
            ->get();

        return view(
            "client.timkiem",
            compact(
                "categorys",
                "article",
                "nameArticle",
                "time",
                "cateSearch"
            )
        );
    }
}
