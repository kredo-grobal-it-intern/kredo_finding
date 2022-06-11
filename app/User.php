<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'self_introduction', 'gender', 'img_name', 'google_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  // Relation
  public function toUserId()
  {
    return $this->hasMany('App\Reaction', 'to_user_id', 'id');
  }

  public function fromUserId()
  {
    return $this->hasMany('App\Reaction', 'from_user_id', 'id');
  }

  public function chatMessages()
  {
    return $this->hasMany('App\ChatMessage');
  }

  public function chatRoomUsers()
  {
    return $this->hasMany('App\ChatRoomUsers');
  }

  # Return true if the Auth user already liked this user
  public function isLiked()
  {
    return $this->toUserId()->where('from_user_id', Auth::user()->id)->exists();
  }
}
