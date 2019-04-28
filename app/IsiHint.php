<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsiHint extends Model
{
    protected $primaryKey = 'id_data_user';
    protected $table = 'data_user';
    protected $fillable = [
        'id_hint','jawab_hint',
    ];

      public function hint(){
        return $this->hasOne('\App\dataHint','id_hint','id_hint');
      }
}
