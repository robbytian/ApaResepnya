<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasUser extends Model
{
    protected $primaryKey = 'id_log';
    protected $table = 'log_aktivitas';
    protected $fillable = [
        'aktivitas', 'id_data_user','id_artikel','id_tutorial',
    ];

}
