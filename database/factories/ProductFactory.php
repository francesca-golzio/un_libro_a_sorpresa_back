<?php

namespace Database\Factories;

use App\Enums\ProductType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = $this->faker->unique()->regexify('[A-Z]{3}[0-9]{2}');

        return [
            'name' => $this->faker->word(),
            'code' => $code,
            'slug' => Str::slug("Product $code", '-'),
            'type' => ProductType::Bookmark,
            'description' => $this->faker->sentence(),
            'price_cents' => $this->faker->numberBetween(100, 10000),
        ];
    }

    /**
     * Configure the factory to create a bookmark
     */
    public function bookmark() : static
    {
        return $this->state([
            'type' => ProductType::Bookmark,
            'price_cents' => 150,
        ]);
    }

    /**
     * Configure the factory to create an 'extra' product 
     * (not included in the basic boxes, buyable as a standalone)
     */
    public function extra() : static
    {
        return $this->state([
            'type' => ProductType::Extra,
        ]);
    }
}
