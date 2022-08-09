<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Reaction;
use App\WorkerReaction;
use App\JobPosting;
use App\Constants\Status;
use Auth;
use App\Constants\UserType;

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
    if(isWorker($user->id)){
      $you_likes = WorkerReaction::where('from_worker_id', Auth::id())->where('status', 0)->pluck('to_job_id');
      $you_liked = JobPosting::whereIn('id', $you_likes)->get();
      $liked_by = $user->toUserId()->where('status', 0)->get();
    }else{
      $you_liked = $user->fromUserId()->where('status', 0)->get();
      $job_postings = JobPosting::where('user_id', Auth::id())->pluck('id');
      $liked_by = WorkerReaction::whereIn('to_job_id', $job_postings)->where('status', 0)->get();
    }
    
    return view('mypage.like', compact('you_liked', 'liked_by'));
  }

  public function showDisliked()
  { 
    if(!isWorker(Auth::id())){
      $user = User::find(Auth::id());
      $you_liked = $user->fromUserId()->where('status', 1)->get();
    }else{
      $you_likes = WorkerReaction::where('from_worker_id', Auth::id())->where('status', 1)->pluck('to_job_id');
      $you_liked = JobPosting::whereIn('id', $you_likes)->get();
    }

    return view('layouts.dislike.show', compact('you_liked'));
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

    $user = $this->user->where('id', $from_user_id)->first();

    if($checkReaction->isEmpty()){
      if($user->user_type == UserType::Company){
        $reaction = new Reaction();

        $reaction->to_user_id = $to_user_id;
        $reaction->from_user_id = $from_user_id;
        $reaction->status = $status;

        $reaction->save();
      }else{
        $workerReaction = new WorkerReaction();

        $workerReaction->to_job_id = $to_user_id;
        $workerReaction->from_worker_id = $from_user_id;
        $workerReaction->status = $status;
  
        $workerReaction->save();
      }
    }
  }

  public function index()
  {
    return view('mypage.like');
  }

  public function changeLikedToDislike($id){
    if(!isWorker(Auth::id())){
      Reaction::where([
        ['to_user_id', $id],
        ['from_user_id', Auth::id()],
        ])->update(['status'=> 1]
      );
    }else{
      WorkerReaction::where([
        ['to_job_id', $id],
        ['from_worker_id', Auth::id()],
        ])->update(['status'=> 1]
      );
    }
    
    return redirect()->back();
  }

  public function changeDislikedToLike($id){
    if(!isWorker(Auth::id())){
      Reaction::where([
        ['to_user_id', $id],
        ['from_user_id', Auth::id()],
        ])->update(['status'=> 0]
      );
    }else{
      WorkerReaction::where([
        ['to_job_id', $id],
        ['from_worker_id', Auth::id()],
        ])->update(['status'=> 0]
      );
    }

    return redirect()->back();
  }
}
