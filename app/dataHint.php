<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataHint extends Model
{
    protected $primaryKey = 'id_hint';
    protected $table = 'hint';
    protected $fillable = [
        'pertanyaan',
    ];
    
}
