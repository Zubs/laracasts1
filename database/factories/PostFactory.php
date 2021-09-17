<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);
        $body = "";

        foreach ($this->faker->paragraphs() as $paragraph) {
            $body = $body . "\n" . $paragraph;
        }

        return [
            'title' => $title,
            'excerpt' => Str::words($body, 25),
            'slug' => $slug,
            'body' => $body,
            'user_id' => User::first()->id
        ];
    }
}
