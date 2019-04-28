<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporKet extends Model
{
    protected $primaryKey = 'id_ket_laporan';
    protected $table = 'laporan_ket';
    protected $fillable =[
            'keterangan',
    ];
}
