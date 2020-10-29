<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//表=>posts
class Post extends Model
{
    protected $guarded = []; //不允许注入的字段
//    protected $fillable = ['title', 'content']; //允许注入的字段
    //关联用户
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
