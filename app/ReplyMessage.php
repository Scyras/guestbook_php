<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyMessage extends Model
{
    //
    // relation ship

   public function message()
   {
       return $this->belongsTo('App\Message');
   }


   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
