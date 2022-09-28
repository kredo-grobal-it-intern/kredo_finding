<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'user_type', 'email', 'password', 'services', 'gender', 'img_name', 'google_id', 'facebook_id', 'contact_number', 'address1', 'address2', 'city', 'state', 'country', 'zipcode'
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

  public function company()
  {
    return $this->hasOne('App\Company');
  }

  public function contacts()
  {
    return $this->hasMany('App\Contact');
  }

  public function jobPostings()
  {
    return $this->hasMany('App\JobPosting');
  }

  public function fromWorkerId()
  {
    return $this->hasMany('App\WorkerReaction', 'from_worker_id', 'id');
  }

  # Return true if the Auth user already liked this user
  public function isLiked()
  {
    return $this->toUserId()->where('from_user_id', Auth::user()->id)->exists();
  }

  public function createUser($data, $bin_image)
  {
    return User::create([
      'name' => $data['name'],
      'user_type' => $data['user_type'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'services' => $data['services'],
      'contact_number' => $data['contact_number'],
      'gender' => $data['gender'],
      'img_name' => $bin_image,
    ]);
  }

  public function updateUser($request, $bin_image)
  {
    return User::where('id', Auth::id())->update(
      [
          'email' =>  $request->email,
          'img_name' => $bin_image,
          'contact_number' => $request->contact_number,
          'gender'=> $request->gender,
      ]
  );
  }

}
