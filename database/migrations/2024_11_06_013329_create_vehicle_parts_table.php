<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclePartsTable extends Migration {
    public function up() {
        Schema::create('vehicle_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('part_id')->constrained('parts');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down() {
        Schema::dropIfExists('vehicle_parts');
    }
}