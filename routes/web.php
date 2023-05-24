<?php

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

Route::get('/posts', function () {
    $blog_posts = [
        [
            "title" => "Unknown",
            "image" => "https://is3-ssl.mzstatic.com/image/thumb/Music115/v4/68/ef/e7/68efe7d2-2493-269a-a29a-1fa4c042a9fe/4547366475357.jpg/600x600bb.jpg",
            "slug" => "reona-unknown",
            "artist" => "ReoNa",
            "body" => "ReoNa Debut Album"
        ],
        [
            "title" => "BOYCOTT - PLDT",
            "image" => "https://is1-ssl.mzstatic.com/image/thumb/Music122/v4/15/aa/14/15aa1421-8d94-c853-cf0a-e488847914ea/4547366449112.jpg/600x600bb.jpg",
            "slug" => "amazarashi-boycott",
            "artist" => "Amazarashi",
            "body" => "Amazarashi 3rd Album"
        ]
    ];

    return view('posts', [
        "title" => "Trial Blog | Posts",
        "posts" => $blog_posts
    ]);
}); 

Route::get('posts/{slug}', function($slug) {
    $blog_posts = [
        [
            "title" => "Unknown",
            "image" => "https://is3-ssl.mzstatic.com/image/thumb/Music115/v4/68/ef/e7/68efe7d2-2493-269a-a29a-1fa4c042a9fe/4547366475357.jpg/600x600bb.jpg",
            "slug" => "reona-unknown",
            "artist" => "ReoNa",
            "body" => "ReoNa Debut Album"
        ],
        [
            "title" => "BOYCOTT - PLDT",
            "image" => "https://is1-ssl.mzstatic.com/image/thumb/Music122/v4/15/aa/14/15aa1421-8d94-c853-cf0a-e488847914ea/4547366449112.jpg/600x600bb.jpg",
            "slug" => "amazarashi-boycott",
            "artist" => "Amazarashi",
            "body" => "Amazarashi 3rd Album"
        ]
    ];

    foreach ($blog_posts as $post) {
        if ($post["slug"] === $slug) {
            $single_post = $post;
        }
    }

    return view("post", [
        "title" => "Trial Blog | " . $single_post["title"],
        "post" => $single_post
    ]);

});
