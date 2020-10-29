<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//
use Illuminate\Foundation\Auth\User as Authenticatable;

//use Illuminate\Contracts\Auth\Authenticatable;

class User extends Authenticatable
{
    //
    protected $guarded = [];
    protected $fillable = [
        'name', 'email','password'
    ];
}
