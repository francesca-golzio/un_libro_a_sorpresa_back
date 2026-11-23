<?php

namespace Database\Factories;

use App\Enums\BoxType;
use App\Models\Box;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Box>
 */
class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = $this->faker->unique()->regexify('[A-Z]{3}[0-9]{2}');

        return [
            'name' => "Box " . $code,
            'code' => $code,
            'slug' => Str::slug("Box $code", '-'),
            'type' => BoxType::Subscription,
            'description' => $this->faker->sentence(),
            'price_cents' => $this->faker->numberBetween(2000, 3500),
        ];
    }

    /** 
     * Configure the factory to create a gift box.
    */
    public function gift() : static
    {
        return $this->state([
            'type' => BoxType::Gift,
            'price_cents' => 3000,
        ]);
    }

    /** 
     * Configure the factory to create a subscription box.
    */
    public function subscription() : static
    {
        return $this->state([
            'type' => BoxType::Subscription,
            'price_cents' => 2500,
        ]);
    }
    
    /** 
     * Configure the factory to create a single box.
    */
    public function single() : static
    {
        return $this->state([
            'type' => BoxType::Single,
            'price_cents' => 3000,
        ]);
    }
}
