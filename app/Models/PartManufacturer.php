<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartManufacturer extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'part_manufacturers'; 

    protected $fillable = [
        'name', 
        'country'
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at']; 
}