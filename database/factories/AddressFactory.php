<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::factory(),
            'recipient_name' => function (array $attributes) {
                $user = User::find($attributes['user_id']);
                return "{$user->surname} {$user->name}";
            },
            // 'recipient_name' => fake()->lastName() . ' ' . fake()->firstName(),
            'country' => 'Italia',
            'region' => 'Piemonte',
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_number' =>  fake()->buildingNumber(),
            'address_line_2' =>  '',
            'phone' =>  fake()->phoneNumber(),
            'is_default_shipping' => false,
            'is_default_billing' => false,
        ];
    }
}
