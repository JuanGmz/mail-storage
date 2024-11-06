<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelType extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'fuel_types';

    protected $fillable = ['tipo'];

    protected $dates = ['deleted_at'];

    public function vehicles() {
        return $this->hasMany(Vehicle::class, 'fuel_type_id');
    }
}