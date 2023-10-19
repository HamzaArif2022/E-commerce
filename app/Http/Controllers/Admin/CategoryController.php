<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::query()->paginate(5);
        return view("Categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return to_route("categories.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $product_category=$category->products()->get();

        return view("Categories.show",compact("product_category","category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("Categories.update",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all())->save();
        return to_route("categories.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category  $category)
    {
        $category->delete();
        return to_route("categories.index");
    }
}
