<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Factories\OwnerFactory;

class Owner extends Seeder {
    public function run() {
        OwnerFactory::factory()->count(10)->create();
    }
}