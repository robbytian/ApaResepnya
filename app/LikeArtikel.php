<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeArtikel extends Model
{
    protected $table = 'like_artikel';
    protected $primaryKey = 'id_like_artikel';
    protected $fillable = [
        'id_data_user','id_artikel',
    ];
}
