<?php

namespace Database\Factories;

use App\Enums\DigitalExpansionType;
use App\Models\Book;
use App\Models\DigitalExpansion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DigitalExpansion>
 */
class DigitalExpansionFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),
            'title' => $this->faker->paragraph(3),
            'type' => DigitalExpansionType::Link,
            'url' => $this->faker->url(),
            'file_path' => null,
            'body' => null,
        ];
    }
    
    /**
     * Configure the factory to create an expansion text
    */
    public function text() : static
    {
        return $this->state([
            'type' => DigitalExpansionType::Text,    
            'url' => null,
            'file_path' => null,
            'body' => $this->faker->text(1500),
        ]);
    }

    /**
     * Configure the factory to create an expansion pdf
    */
    public function pdf() : static
    {
        return $this->state([
            'type' => DigitalExpansionType::Pdf,    
            'url' => null,
            'file_path' => $this->faker->filePath(),
            'body' => null,
        ]);
    }

    /**
     * Configure the factory to create an external expansion (url)
    */
    public function url() : static
    {
        return $this->state([
            'type' => DigitalExpansionType::Link,    
            'url' =>  $this->faker->url(),
            'file_path' => null,
            'body' => null,
        ]);
    }

    /**
     * Configure the factory to create an expansion audio file
    */
    public function audio() : static
    {
        return $this->state([
            'type' => DigitalExpansionType::Audio,    
            'url' => null,
            'file_path' => $this->faker->filePath(),
            'body' => null,
        ]);
    }    
}
