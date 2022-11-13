<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{ //'name','title','email','description','start_date','due_date'
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->name(),
            'email' => $this->faker->email(),
            'description' => $this->faker->text(),
            'start_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
        ];
    }
}
