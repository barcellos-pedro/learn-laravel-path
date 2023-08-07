<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /** 
     * Enable fields to create a new Post
     * e.g: using Post::create(['title'])...
     * */
    protected $fillable = [
        'title',
        'excerpt',
        'body'
    ];

    /**
     * Enable mass assignment on all fields,
     * except those listed below.
     * Opposite of $fillable;
     */
    protected $guarded = ['id'];
}
