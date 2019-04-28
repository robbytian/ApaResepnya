<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporPost extends Model
{
    protected $primaryKey = 'id_laporan';
    protected $table = 'riwayat_laporan';
    protected $fillable =[
            'id_artikel','id_tutorial','alasan','username',
    ];
}
