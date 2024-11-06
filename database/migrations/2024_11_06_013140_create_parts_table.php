<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration {
    public function up() {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained('part_manufacturers'); 
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(){
        Schema::dropIfExists('parts');
    }
}