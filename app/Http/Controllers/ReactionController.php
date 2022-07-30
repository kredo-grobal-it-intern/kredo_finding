<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

use App\User;
use App\Reaction;
use App\Constants\Status;
use Auth;

//use Log;

class ReactionController extends Controller
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function show()
  {
    $user = User::find(Auth::id());
    $you_liked = $user->fromUserId()->where('status', 0)->get();
    $liked_by = $user->toUserId()->where('status', 0)->get();

    return view('mypage.like', compact('you_liked', 'liked_by'));
  }

  public function showDisliked()
  {
    $user = User::find(Auth::id());
    $you_liked = $user->fromUserId()->where('status', 1)->get();
    $liked_by = $user->toUserId()->where('status', 1)->get();

    return view('layouts.dislike.show', compact('you_liked', 'liked_by'));
  }

  public function create(Request $request)
  {
    $to_user_id = $request->to_user_id;
    $like_status = $request->reaction;
    $from_user_id = $request->from_user_id;

    if ($like_status === 'like'){
      $status = Status::LIKE;
    }else{
      $status = Status::DISLIKE;
    }

    $checkReaction = Reaction::where([
      ['to_user_id', $to_user_id],
      ['from_user_id', $from_user_id]
    ])->get();

    if($checkReaction->isEmpty()){

      $reaction = new Reaction();

      $reaction->to_user_id = $to_user_id;
      $reaction->from_user_id = $from_user_id;
      $reaction->status = $status;

      $reaction->save();
    }
  }

  public function index()
  {
    return view('mypage.like');
  }

  public function ChangeLiked($id){
     Reaction::where([
      ['to_user_id', $id],
      ['from_user_id', Auth::id()],
     ])->update(['status'=> 1]);
     return redirect()->back();
  }

  public function ChangeDisliked($id){
    Reaction::where([
     ['to_user_id', $id],
     ['from_user_id', Auth::id()],
    ])->update(['status'=> 0]);
    return redirect()->back();
 }

  public function showLikedUser($id){
    $user = User::find($id);
    return view('mypage.liked_user_detail')->with('user', $user);
  }

  public function showLikedCompany($id){
    $company = User::find($id);
    return view('mypage.liked_company_detail')->with('company', $company);
  }
}
