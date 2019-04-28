<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like_tutorial';
    protected $primaryKey = 'id_like_tutorial';
    protected $fillable = [
        'id_data_user','id_tutorial',
    ];
}
