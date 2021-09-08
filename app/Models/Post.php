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
        if (!file_exists($path = resource_path("/posts/" . $slug . ".html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember('post.' . $slug, now()->addDays(3), fn() => file_get_contents($path));
    }

    public static function all () {
        $posts = collect(File::files(resource_path("posts")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($file) => new Post($file->matter('title'), $file->matter('excerpt'), $file->matter('date'), $file->body(), $file->matter('slug')));

        return $posts;
    }
}
