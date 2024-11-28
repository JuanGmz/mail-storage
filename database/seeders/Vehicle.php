<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\VehicleFactory;

class Vehicle extends Seeder {
    public function run() {
        VehicleFactory::times(10)->create();
    }
}