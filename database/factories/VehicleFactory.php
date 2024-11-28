<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory {
    public function definition() {
        return [
            'owner_id' => $this->faker->numberBetween(1, 10),
            'make' => $this->faker->word,
            'mod' => $this->faker->word,
            'brand' => $this->faker->brand111
        ];
    }
}