<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $primaryKey = 'id_data_user';
    protected $table = 'data_user';
    protected $fillable = [
        'nama_lengkap', 'email', 'no_hp','jenkel','foto','username','id_hint','jawab_hint',
    ];

    public function users(){
        return $this->hasOne('\App\User','username','username');
      }

      public function hint(){
        return $this->hasOne('\App\dataHint','id_hint','id_hint');
      }
}
