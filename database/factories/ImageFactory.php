<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Box;
use App\Models\CardModel;
use App\Models\Image;
use App\Models\PackagingOption;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),
            'box_id' => null,
            'product_id' => null,
            'packaging_option_id' => null,
            'card_model_id' => null,
            'path' =>  fn() => 'images/books/' . $this->faker->uuid() . '.webp',
            'alt_text' => $this->faker->sentence(),
            'sort_order' => 0,
        ];
    }

    /** 
     * Configure the factory to create a book image.
    */
    public function book() : static
    {
        return $this->state([
            'book_id' => Book::factory(),
            'box_id' => null,
            'product_id' => null,
            'packaging_option_id' => null,
            'card_model_id' => null,
            'path' => fn() => 'images/books/' . $this->faker->uuid() . '.webp',
        ]);
    }

    /** 
     * Configure the factory to create a box image.
    */
    public function box() : static
    {
        return $this->state([
            'book_id' => null,
            'box_id' => Box::factory(),
            'product_id' => null,
            'packaging_option_id' => null,
            'card_model_id' => null,
            'path' => fn() => 'images/boxes/' . $this->faker->uuid() . '.webp',
        ]);
    }

    /** 
     * Configure the factory to create a product image.
    */
    public function product() : static
    {
        return $this->state([
            'book_id' => null,
            'box_id' => null,
            'product_id' => Product::factory(),
            'packaging_option_id' => null,
            'card_model_id' => null,
            'path' => fn() => 'images/products/' . $this->faker->uuid() . '.webp',
        ]);
    }

    /** 
     * Configure the factory to create a packaging option image.
    */
    public function packagingOption() : static
    {
        return $this->state([
            'book_id' => null,
            'box_id' => null,
            'product_id' => null,
            'packaging_option_id' => PackagingOption::factory(),
            'card_model_id' => null,
            'path' => fn() => 'images/packaging-options/' . $this->faker->uuid() . '.webp',
        ]);
    }
}
