<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'parts'; 

    protected $fillable = [
        'manufacturer_id', 
        'name'
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at']; 

    public function manufacturer() {
        return $this->belongsTo(PartManufacturer::class, 'manufacturer_id');
    }
}
