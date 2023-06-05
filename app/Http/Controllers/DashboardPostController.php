<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', [
            'posts' => $posts,
        ]);

        // return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
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
            'category_id' => ['required'],
            'title' => ['required', 'max:255'],
            'artist' => ['required', 'max:255'],
            'image' => ['image', 'max:1024', 'file' ],
            'slug' => ['required', 'unique:posts'],
            'body' => ['required'],
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('header-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        // Method laravel 10 bloug
        // $validatedData['excerpt'] = Str::excerpt(strip_tags($validatedData['body']), 'excerpt', [
        //     'radius' => 5,
        // ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 10);

        if (Post::create($validatedData)) {
            $request->session()->flash('success', 'Your post has been created');
            return redirect('/dashboard/posts');
        } else {
            $request->session()->flash('error', 'Sum Ting Wong');
            return redirect('/dashboard/posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {


        $rules = [
            'category_id' => ['required'],
            'title' => ['required', 'max:255'],
            'artist' => ['required', 'max:255'],
            'image' => ['image', 'max:1024', 'file' ],
            'body' => ['required'],
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = ['required', 'unique:posts'];
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {

            if($post->image) {
                unlink(storage_path('app/public/' . $post->image));
            }
            $validatedData['image'] = $request->file('image')->store('header-images');
        }

        $update_post = Post::where('id', $post->id)
            ->update($validatedData);

        if ($update_post) {
            $request->session()->flash('success', 'Your post has been updated');
            return redirect('/dashboard/posts');
        } else {
            $request->session()->flash('error', 'Sum Ting Wong');
            return redirect('/dashboard/posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        if (Post::destroy($post->id)) {
            if($post->image) {
                unlink(storage_path('app/public/' . $post->image));
            }
            $request->session()->flash('success', 'Your post has been deleted');
            return redirect('/dashboard/posts');
        } else {
            $request->session()->flash('error', 'Sum Ting Wong');
            return redirect('/dashboard/posts');
        }
    }

    public function makeSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);

    }

}
