<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'unique:categories'],
            'slug' => ['required', 'unique:categories'],
        ]);

        try {
            Category::create([
                'name' => $validatedData['name'],
                'slug' => $validatedData['slug'],
            ]);
            return redirect('/dashboard/categories')->with('success', 'Category created successfully');
        } catch (\Throwable $th) {
            return redirect('/dashboard/categories')->with('error', 'Category failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => ['required', 'max:255', 'unique:categories'],
            'slug' => ['required', 'unique:categories'],
        ];
        if($request->name == $category->name) {
            $rules['name'] = ['required', 'max:255'];
        }
        if($request->slug == $category->slug) {
            $rules['slug'] = ['required'];
        }

        $validatedData = $request->validate($rules);

        $updateCategory = Category::where('id', $category->id)->first();

        try {
            $updateCategory->update([
                'name' => $validatedData['name'],
                'slug' => $validatedData['slug'],
            ]);
            return redirect('/dashboard/categories')->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            return redirect('/dashboard/categories')->with('error', 'Sum Ting Wong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Request $request)
    {
        try {
            if($category->post->count()) {
                return back()->with('error', 'Category cannot be deleted because it has posts');
            } else {
                $category->delete();
                return back()->with('success', 'Category deleted successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Sum Ting Wong');
        }
        
    }

    public function makeSlug(Request $request) {
        $slug = SlugService::createSlug( Category::class , 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
