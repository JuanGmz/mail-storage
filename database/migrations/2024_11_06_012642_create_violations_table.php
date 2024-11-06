<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationsTable extends Migration {
    public function up() {
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->dateTime('date');
            $table->string('reason');
            $table->decimal('fine', 10, 2);
            $table->string('address');
            $table->string('phone');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down() {
        Schema::dropIfExists('violations');
    }
}