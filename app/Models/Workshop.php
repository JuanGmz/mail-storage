<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'workshops';

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    protected $dates = ['deleted_at'];
}