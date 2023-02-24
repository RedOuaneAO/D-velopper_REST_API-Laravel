<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->title(),
            'image'=>fake()->imageUrl(),
            'article'=>fake()->text(),
            'Category_id'=>category::inRandomOrder()->first()->id,
            'Author_id'=> User::inRandomOrder()->first()->id
        ];
    }
}
