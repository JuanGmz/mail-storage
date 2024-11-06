<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Vehicle;
use App\Models\Workshop;

class MaintenanceRecord extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'workshop_id',
        'service_date',
        'description',
        'cost',
    ];

    protected $dates = ['deleted_at', 'service_date'];

    // Define relationships
    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function workshop() {
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }
}