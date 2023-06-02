<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->filter(request(['search', 'category', 'user']));

        $header = "";

        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $header = $category->name . " Category ";
        } elseif(request('user')) {
            $user = User::firstWhere('username', request('user'));
            $header = " All Posts By " . $user->name;
        } elseif(request('search')) {
            $search = request('search');
            $header = "Posts with " .  $search;
        } else {
            $header = "All Posts";
        }

        return view('posts', [
            "title" => "Trial Blog | Posts",
            "header" => $header,
            "posts" => $posts->paginate(7)->withQueryString()
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
    public function show(Post $post) {
        return view("post", [
            "title" => "Trial Blog | " . $post->title,
            "header" => "Trial Blog",
            "post" => $post
        ]);
    }
}
