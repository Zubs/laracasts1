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

    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function find ($slug) {
        if (!file_exists($path = resource_path("/posts/" . $slug . ".html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember('post.' . $slug, now()->addDays(3), fn() => file_get_contents($path));
    }

    public static function all () {
        $files = File::files(resource_path("posts"));
        $posts = [];

        foreach ($files as $file) {
            $document = YamlFrontMatter::parseFile($file);

            $posts[] = [
                'title' => $document->matter('title'),
                'body' => $document->body(),
                'excerpt' => $document->matter('excerpt'),
                'date' => $document->matter('date'),
            ];
        }

        ddd($posts);

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
}
