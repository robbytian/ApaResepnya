<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $primaryKey = 'id_comment_tutorial';
    protected $table = 'comment_tutorial';
    protected $fillable =[
            'comment','id_data_user','id_tutorial'
    ];
}
