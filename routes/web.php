<?php

use App\Http\Controllers\PostsController;
use App\Models\Posts;
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

Route::get('posts/{slug}', [PostsController::class, 'show']);
