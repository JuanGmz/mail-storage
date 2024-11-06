<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');
            $table->foreignId('fuel_type_id')->constrained('fuel_types')->onDelete('cascade');
            $table->string('brand');
            $table->string('model');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('vehicles');
    }
};