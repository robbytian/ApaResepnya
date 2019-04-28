<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArtikel extends Model
{
    protected $primaryKey = 'id_sub_artikel';
    protected $table = 'sub_artikel';
    protected $fillable = [
        'nama',
    ];
}
