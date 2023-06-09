<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return view('categories', [
            'title' => 'Trial Blog | Categories',
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('posts', [
            'title' => "Trial Blog | $category->name",
            'header' => "$category->name Category",
            'posts' => $category->posts->load('category', 'user'),
            'category' => $category->name
        ]);
    }
}
