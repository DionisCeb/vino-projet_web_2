<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bottle>
 */
class BottleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name ,
            'image' => $this->faker->sentence ,
            'saq_code' => $this->faker->name ,
            'country' => $this->faker->name ,
            'saq_price' => $this->faker->randomFloat(1, 10, 99) ,
            'saq_url' => $this->faker->sentence ,
            'image_url' => $this->faker->sentence ,
            'format' => $this->faker->name ,
            'type' => $this->faker->boolean ,
        ];
    }
}
