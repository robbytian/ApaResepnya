<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'id_tutorial';
    protected $table = 'tutorial';
    protected $fillable = [
        'judul', 'thumbnail','video_header','deskripsi','porsi','waktu_masak','id_category','id_sub_post','id_data_user','status',
    ];

    public function data_user(){
        return $this->hasOne('\App\DataUser','id_data_user','id_data_user');
      }
}
