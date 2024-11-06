<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsurancePolicy extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'insurance_policies';
    protected $fillable = [
        'vehicle_id',
        'provider',
        'policy',
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    // Define relationships
    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}