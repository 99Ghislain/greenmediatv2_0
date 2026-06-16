<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeoffre extends Model
{
    protected $table = 'typeoffres';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];
    
}
