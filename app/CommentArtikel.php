<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentArtikel extends Model
{
    protected $primaryKey = 'id_comment_artikell';
    protected $table = 'comment_artikel';
    protected $fillable =[
            'comment','id_data_user','id_artikel'
    ];
}
