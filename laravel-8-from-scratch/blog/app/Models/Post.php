<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'slug',
        'category_id',
        'user_id',
    ];

    /**
     * Besides filtering per se. eg: Post::all()->filter()...
     * eliminates the need to create an additional route
     * to each possible filter: slug|author|category
     */
    public function scopeFilter($query, array $filters)
    {
        if (empty($filters)) return;

        // filter by search text
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%")
        );

        // filter by category
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            );
        });

        // filter by author username
        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', 'like', "%{$author}%")
            );
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
