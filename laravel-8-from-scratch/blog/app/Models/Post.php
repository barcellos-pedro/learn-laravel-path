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

    /** Get all files from posts directory */
    public static function all()
    {
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($file) => Post::fromDocument($file));
    }

    /**
     * Find a post by its slug, and return post's content
     * if not found, throws ModelNotFoundException
     */
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
