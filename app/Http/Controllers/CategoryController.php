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
        $categories = Category::withTrashed()->latest()->get();
        return view('panel.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->whereNotNull('parent_id')->get();
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
            'is_active',
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
        $category = Category::withTrashed()->findOrFail($id);
        $categories = Category::orderBy('name')->whereNotNull('parent_id')->where('id', '!=', $id)->get();

        return view('panel.categories.edit-category', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if($category->trashed()) {
            $category->restore();
            $message = "Kategori geri yüklendi";
        } else {
            $category->delete();
            $message = "Kategori kaldırıldı";
        }

        return $this->success('panel.categories.index', $message);
    }
}
