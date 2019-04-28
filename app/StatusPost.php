<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPost extends Model
{
    protected $primaryKey = 'id_tutorial';
    protected $table = 'tutorial';
    protected $fillable = [
        'status',
    ];
}
