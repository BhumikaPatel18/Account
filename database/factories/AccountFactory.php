<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { //'user_name','first_name','last_name','dob','phone','email','address','country','state','gender','hobby'
        return [
            'user_name' => $this->faker->name(),
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->PhoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'state' => $this->faker->state(),
            // 'gender' => $this->faker->name(),
            // 'hobby' => $this->faker->name(),
        ];
    }
}
