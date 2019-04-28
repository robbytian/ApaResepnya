<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusArtikel extends Model
{
    protected $primaryKey = 'id_artikel';
    protected $table = 'artikel';
    protected $fillable = [
        'status',
    ];
}
