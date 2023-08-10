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
     * Activated when using filter() on Model
     * First argument is passed automatically
     * by Laravel query builder
     */
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $search = '%' . $filters['search'] . '%';

            $query->where('title', 'like', $search)
                ->orWhere('body', 'like', $search);
        }
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
