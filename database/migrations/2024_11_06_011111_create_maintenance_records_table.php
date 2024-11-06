<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRecordsTable extends Migration {
    public function up() {
        Schema::create('maintenance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('workshop_id')->constrained()->onDelete('cascade');
            $table->dateTime('service_date');
            $table->text('description');
            $table->decimal('cost', 10, 2);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down() {
        Schema::dropIfExists('maintenance_records');
    }
}