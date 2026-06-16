<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'img',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
