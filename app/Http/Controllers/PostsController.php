<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "Trial Blog | Posts",
            "posts" => Posts::all()
        ]);
    }

    public function show($slug) {
        return view("post", [
            "title" => "Trial Blog | " . Posts::find($slug)["title"],
            "post" => Posts::find($slug)
        ]);
    }
}
