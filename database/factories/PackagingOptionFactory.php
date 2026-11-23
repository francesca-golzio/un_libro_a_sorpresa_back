<?php

namespace Database\Factories;

use App\Models\PackagingOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PackagingOption>
 */
class PackagingOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = $this->faker->unique()->regexify('[A-Z]{3}[0-9]{2}');

        return [
            'name' => 'Test ' . $code,
            'code' => $code,
            'description' => $this->faker->sentence(),
            'price_cents' => $this->faker->numberBetween(100, 2000),
            'is_active' => true
        ];
    }

    /** 
     * Configure the factory to create a standard packaging option.
    */
    public function standard() : static
    {
        return $this->state([
            'name' => 'Standard',
            'code' => 'PKG00',
            'price_cents' => 0,
        ]);
    }

    /** 
     * Configure the factory to create a deluxe packaging option.
    */
    public function deluxe() : static
    {
        return $this->state([
            'name' => 'Deluxe',
            'code' => 'PKG01',
            'price_cents' => 1000,
        ]);
    }

}
