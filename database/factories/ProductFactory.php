<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postImg=['one.jpg','two.jpg'];
        return [
            'title'=>fake()->sentence(3),
            'image'=>$postImg[rand(0,1)],
            'description'=>fake()->paragraph(5),
            'category_id'=>Category::all()->random()->id,
            'price'=>fake()->numberBetween(10,20),
        ];
    }
}
