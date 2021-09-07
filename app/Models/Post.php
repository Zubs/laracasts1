<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{
    public static function find ($slug) {
        if (!file_exists($path = resource_path("/posts/" . $slug . ".html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember('post.' . $slug, now()->addDays(3), fn() => file_get_contents($path));
    }

    public static function all () {
        $files = File::files(resource_path("posts"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
}
