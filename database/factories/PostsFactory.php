<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => rtrim($this->faker->sentence(mt_rand(2, 6)), "."),
            'image' => $this->faker->imageUrl(600, 600),
            'slug' => $this->faker->slug(),
            'artist' => $this->faker->name(),
            'excerpt' => $this->faker->sentence(mt_rand(3, 5)),
            
            // Implode Method
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',

            // Map Method
            // 'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function ($p) {
            //     return "<p>$p</p>";
            // }),

            // Alt-Map Method
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn ($p) => "<p>$p</p>")->implode(''),

            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3)
        ];
    }
}
