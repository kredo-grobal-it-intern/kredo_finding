<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Company;
use Auth;
use Hash;
use App\Constants\UserType;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth', ['only' => ['index', 'showChangePasswordGet', 'changePasswordPost']]);
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $user = User::find(Auth::id());

    if($user->user_type == UserType::Worker){
      $users = User::all()->where('user_type', UserType::Company);
    }else{
      $users = User::all()->where('user_type', UserType::Worker);
    }

    $userCount = $users->count();
    $from_user_id = Auth::id();

    return view('home', compact('users', 'userCount', 'from_user_id'));
  }

  public function showChangePasswordGet() {
    return view('auth.passwords.change-password');
  }

  public function changePasswordPost(Request $request) {
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->back()->with("error","Your current password does not matches with the password.");
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        return redirect()->back()->with("error","New Password cannot be same as your current password.");
    }

    $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    if($user->user_type == UserType::Company){
      Company::where('user_id', Auth::id())->update(['password' => $user->password]);
    }

    return redirect()->route('home')->with("success","Password successfully changed!");

  }

  public function showAbout(){
    return view('menu_top.about_us');
  }
  public function showContact(){
    return view('menu_top.contact_us');
  }
  public function showFaq(){
    return view('menu_top.faq');
  }
}

