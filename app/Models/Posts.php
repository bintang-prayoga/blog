<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'image', 'slug', 'artist', 'excerpt', 'body', 'published_at'];

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
