<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'owners';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
    ];

    protected $dates = ['deleted_at'];

    public function vehicles() {
        return $this->hasMany(Vehicle::class, 'owner_id');
    }
}