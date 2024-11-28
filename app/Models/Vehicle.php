<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Owner;
use App\Models\FuelType;
use App\Models\MaintenanceRecord;
use App\Models\InsurancePolicy;
use App\Models\Violation;
use App\Models\VehiclePart;

class Vehicle extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'vehicles';

    protected $fillable = [
        'owner_id',
        'fuel_type_id',
        'brand',
        'mod',
    ];

    protected $dates = ['deleted_at'];

    public function owner() {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function fuelType() {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }
}