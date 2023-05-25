<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Posts extends Model
// {
//     use HasFactory;
// }

class Posts {
    private static $blog_posts = [
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

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find ($slug) {
        $posts = static::all();
        $single_post = $posts->firstWhere('slug', $slug);

        return $single_post;
    }
}