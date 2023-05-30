<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {

        $posts = Posts::latest()->filter(request(['search']));

        return view('posts', [
            "title" => "Trial Blog | Posts",
            "header" => "All Posts",
            "posts" => $posts->get()
        ]);
    }

    // Slug is the parameter
    // public function show($slug) {
    //     return view("post", [
    //         "title" => "Trial Blog | " . Posts::where("slug", $slug)->first()->title,
    //         "post" => Posts::where("slug", $slug)->first()
    //     ]);
    // }

    // Using Route Model Binding
    public function show(Posts $post) {
        return view("post", [
            "title" => "Trial Blog | " . $post->title,
            "header" => "Trial Blog",
            "post" => $post
        ]);
    }
}
