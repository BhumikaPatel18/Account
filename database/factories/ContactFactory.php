<?php

namespace Database\Factories;
use App\Models;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{ //'name','email','phone','contact','company_name','address','message'
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->PhoneNumber(),
            'contact' => $this->faker->PhoneNumber(),
            'company_name' => $this->faker->Company(),
            'address' => $this->faker->address(),
            'message' => $this->faker->text(),
        ];
    }
}
