<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\Document;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public $title,
        public $slug,
        public $excerpt,
        public $date,
        public $body
    )
    {
    }

    /** Instantiate a new Post from a Spatie\YamlFrontMatter\Document */
    public static function fromDocument(Document $document)
    {
        $title = $document->matter('title');
        $slug = $document->matter('slug');
        $excerpt = $document->matter('excerpt');
        $date = $document->matter('date');
        $body = $document->body();
        return new static($title, $slug, $excerpt, $date, $body);
    }

    /** Get all posts */
    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($file) => Post::fromDocument($file))
                ->sortByDesc('date');
        });
    }

    /** Find a post by its slug */
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
