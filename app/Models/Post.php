<?php

namespace App\Models;

class Post
{
    public static function find ($slug) {
        if (!file_exists($path = resource_path("/posts/" . $slug . ".html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember('post.' . $slug, now()->addDays(3), fn() => file_get_contents($path));
    }
}
