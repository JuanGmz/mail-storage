<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartManufacturersTable extends Migration {
    public function up() {
        Schema::create('part_manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('part_manufacturers');
    }
}