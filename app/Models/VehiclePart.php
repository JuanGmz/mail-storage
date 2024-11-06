<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehiclePart extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'vehicle_parts';

    protected $fillable = [
        'vehicle_id', 
        'part_id'
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at']; 

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function part() {
        return $this->belongsTo(Part::class, 'part_id');
    }
}