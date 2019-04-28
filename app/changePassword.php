<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class changePassword extends Model
{
    protected $primaryKey = 'username';
    protected $table = 'users';
    protected $fillable = [
        'password',
    ];

    protected $hidden = [
        'password', 
    ];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }


}
