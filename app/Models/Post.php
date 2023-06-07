<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $guarded = ['id'];
    protected $fillable = [
        'category_id',
        'user_id',
        'title', 
        'slug', 
        'image', 
        'artist', 
        'excerpt', 
        'body', 
        'published_at',
    ];

    protected $with = ['category', 'user'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereHas('user', fn($query) => $query->where('username', $user))
        );
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
