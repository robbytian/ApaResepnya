<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangkahTutorial extends Model
{
    protected $primaryKey = 'id_langkah';
    protected $table = 'langkah_tutorial';
    protected $fillable =[
            'langkah','id_tutorial',
    ];
}
