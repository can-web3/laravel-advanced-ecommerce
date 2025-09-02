<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest()->get();
        return view('panel.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('panel.categories.create-category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $inputs = $request->only([
            'name',
            'parent_id',
        ]);

        Category::create($inputs);

        return $this->success('panel.categories.index', 'Kategori eklendi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::orderBy('name')->where('id', '!=', $id)->get();
        return view('panel.categories.edit-category', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $inputs = $request->only(['name', 'parent_id']);

        $category = Category::findOrFail($id);
        $category->update($inputs);

        return $this->success('panel.categories.index', 'Kategori güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $message = "$category->name kategorisi silindi";

        $category->delete();

        return $this->success('panel.categories.index', $message);
    }
}
