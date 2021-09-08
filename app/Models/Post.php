<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find ($slug) {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function all () {
        return cache()->rememberForever('posts.all',  function () {
            return collect(File::files(resource_path("posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($file) => new Post($file->matter('title'), $file->matter('excerpt'), $file->matter('date'), $file->body(), $file->matter('slug')))
                ->sortBy('date');
        });
    }
}
