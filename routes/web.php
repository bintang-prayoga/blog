<?php

use App\Http\Controllers\PostsController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Trial Blog | Home"
    ]); 
});

Route::get('/about', function () {
    return view('about', [
        "title" => "Trial Blog | About",
        'nama' => 'Bintang Prayoga', 
        "email" => "bprayoga1927@gmail.com",
        "image" => "https://cdn.discordapp.com/attachments/1021055312087748608/1030091692877041674/Sing_The_Moon.jpg"
    ]);
});

Route::get('/posts', [PostsController::class, 'index']); 


// Route Model Binding
// Route::get('posts/{post}', [PostsController::class, 'show']);

// Route Model Binding with Slug
Route::get('/posts/{post:slug}', [PostsController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Trial Blog | Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('category', [
        'title' => "Post by Category: $category->name",
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});