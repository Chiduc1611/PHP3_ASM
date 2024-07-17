<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::with(['children', 'parent'])->latest('id')->paginate(10);

        return view('admin.layouts.categorys.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategory = Category::whereNull('parent_id')->get();

        return view('admin.layouts.categorys.create', compact('parentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Category::query()->create($data);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parentCategory = Category::whereNull('parent_id')->get();

        return view('admin.layouts.categorys.edit', compact('category', 'parentCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
