<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reaction;
use App\WorkerReaction;
use App\JobPosting;
use App\User;
use Auth;
use App\Constants\UserType;

use App\Constants\Status;

class MatchingController extends Controller
{
  public static function index(){
    if(!isWorker(Auth::id())){
      $got_reaction_ids = Reaction::where([
        ['from_user_id', Auth::id()],
        ['status', Status::LIKE]
      ])->pluck('to_user_id');

      $job_postings = JobPosting::where('user_id', Auth::id())->pluck('id');
      
      $matching_ids = WorkerReaction::whereIn('from_worker_id', $got_reaction_ids)
        ->where('status', Status::LIKE)
        ->whereIn('to_job_id', $job_postings)
        ->pluck('from_worker_id');
    }else{
      $got_reaction_ids = WorkerReaction::where([
        ['from_worker_id', Auth::id()],
        ['status', Status::LIKE]
      ])->pluck('to_job_id');

      $job_postings = JobPosting::whereIn('id', $got_reaction_ids)->get();

      foreach($job_postings as $job_posting){
        $got_reaction_ids[] = $job_posting->companyUser->id;
      }

      $matching_ids = Reaction::whereIn('from_user_id', $got_reaction_ids)
        ->where('status', Status::LIKE)
        ->where('to_user_id', Auth::id())
        ->pluck('from_user_id');
    }

    $matching_users = User::whereIn('id', $matching_ids)->get();

    $match_users_count = count($matching_users);

    return view('mypage.message', compact('matching_users', 'match_users_count'));

    // var_dump($matching_users);
  }
}
