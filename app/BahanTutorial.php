<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanTutorial extends Model
{
    protected $primaryKey = 'id_bahan';
    protected $table = 'bahan_tutorial';
    protected $fillable =[
            'bahan','id_tutorial',
    ];
}
