<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockPost extends Model
{
    protected $primaryKey = 'id_block';
    protected $table = 'block_post';
    protected $fillable =[
            'alasan','id_artikel','id_tutorial',
    ];

    public function tutorial(){
        return $this->hasMany('\App\Post','id_tutorial','id_tutorial');
      }
      
}
