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
        'body',
        'slug'
    ];

    /**
     * Enable mass assignment on all fields,
     * except those listed below.
     * Opposite of $fillable;
     */
    // protected $guarded = ['id'];

    /**
     * Set default attribute to use on route model binding
     * replacing the default (id)
     * 
     * Nice to use when there is multiple routes using
     * that key /post/{post:<field>}
     * So we define in only one place, the model
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
