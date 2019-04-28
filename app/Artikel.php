<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $primaryKey = 'id_artikel';
    protected $table = 'artikel';
    protected $fillable = [
        'judul', 'thumbnail','isi_artikel','id_sub_artikel','id_data_user','status',
    ];

    public function data_user(){
        return $this->hasOne('\App\DataUser','id_data_user','id_data_user');
    }
}
