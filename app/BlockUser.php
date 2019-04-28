<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
    protected $primaryKey = 'id_block';
    protected $table = 'block_user';
    protected $fillable =[
            'alasan','username',
    ];

    public function akun(){
        return $this->hasMany('\App\DataUser','id_data_user','id_data_user');
      }
}
