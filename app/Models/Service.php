<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'id',
        'img_service',
        'logo_service',
        'title_service',
        'descrip_service',
        'content_service',
        'slug_service',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
