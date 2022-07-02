<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  { 
    $user = User::find(Auth::id());

    if($user->user_type == 0){
      $users = User::all()->where('user_type', 1);
    }else{
      $users = User::all()->where('user_type', 0);
    }
    
    $userCount = $users->count();
    $from_user_id = Auth::id();

    return view('home', compact('users', 'userCount', 'from_user_id'));
  }
}
