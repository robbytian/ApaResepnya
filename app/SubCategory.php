<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $primaryKey = 'id_sub_post';
    protected $table = 'sub_category_post';
    protected $fillable = [
        'nama','id_category',
    ];
}
