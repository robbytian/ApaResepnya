<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSosmed extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'username';
    protected $table = 'user_sosmed';
    protected $fillable = [
       'username','name','email', 'uid','level', 'id_data_user',
    ];
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'uid', 
    ];
    public function data_user(){
        return $this->belongsTo('\App\DataUser','id_data_user','id_data_user');
    }
}
