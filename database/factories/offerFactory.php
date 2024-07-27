<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class offerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->title(),
            'description'=>fake()->text(),
            'image'=>fake()->imageUrl(),
            'code'=>fake()->postcode(),
            'discount'=>fake()->randomNumber(),
            'type'=>fake()->random_int(0,1),
            'expire_date'=>fake()->date(),
            'service_id'=>fake()->random_int(1,10),
        ];
    }
}
