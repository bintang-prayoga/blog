<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function show(User $author)
    {
        return view('posts', [
            'title' => "Trial Blog | $author->name",
            'header' => "Posts by $author->name",
            'posts' => $author->posts->load('category', 'user'),
            'author' => $author->name
        ]);
    }
}
