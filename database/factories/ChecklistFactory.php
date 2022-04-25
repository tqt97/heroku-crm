<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checklist_group_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name,
        ];
    }
}
