<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function replies()
    {
        return $this->hasMany('App\ReplyMessage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
