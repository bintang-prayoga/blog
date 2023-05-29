<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function show(User $author)
    {
        return view('author', [
            'title' => "Post by Author: $author->name",
            'posts' => $author->posts->load('category', 'user'),
            'author' => $author->name
        ]);
    }
}
