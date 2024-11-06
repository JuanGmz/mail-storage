<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Violation extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'violations';
    protected $fillable = [
        'vehicle_id',
        'date',
        'reason',
        'fine',
        'address',
        'phone',
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    // Define relationships
    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}