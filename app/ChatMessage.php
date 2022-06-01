<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
  protected $fillable = ['user_id','chat_room_id', 'message'];

  public function chatRoom()
  {
    return $this->belongsTo('App\ChatRoom');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}


