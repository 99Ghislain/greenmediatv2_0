<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $table = 'offres';

    protected $fillable = [
        'id',
        'title_offre',
        'title_link_offre',
        'desc_offre',
        'content_offre',
        'image_offre',
        'slug_offre',
        'typeoffre_id',
        'view_offre',
        'created_at',
        'updated_at',
    ];
}
