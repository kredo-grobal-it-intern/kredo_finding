<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
  protected $fillable = ['to_user_id', 'from_user_id', 'status'];
  
  // Relation
  public function toUserId()
  {
    return $this->belongsTo('App\User', 'to_user_id', 'id');
  }

  public function fromUserId()
  {
    return $this->belongsTo('App\User', 'from_user_id', 'id');
  }

}
