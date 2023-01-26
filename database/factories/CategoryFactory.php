<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postImg=['cone.jpg','ctwo.jpg','cthree.jpg','cfour.jpg'];
        return [
            'ctitle'=>fake()->text(5),
            'cimage'=>$postImg[rand(0,3)],
        ];
    }
}
