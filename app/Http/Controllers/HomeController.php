<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Company;
use App\Country;
use Auth;
use Hash;
use App\Constants\UserType;
use App\JobPosting;
use App\Reaction;
use App\WorkerReaction;

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
  public function index(Request $request)
  {
    $user = User::find(Auth::id());
    $countries = Country::pluck('name', 'code')->all();

    if(isWorker($user->id)){
      $users = User::all()->where('user_type', UserType::Company);
    }else{
      $users = User::all()->where('user_type', UserType::Worker);
    }

    $userCount = $users->count();
    $from_user_id = Auth::id();

    if($request->preferred_state){
      $users = $users->where('preferred_state', 'LIKE', '%'.$request->preferred_state.'%');
    }
    if($request->occupation){
      $users = $users->where('occupation', $request->occupation);
    }
    if($request->preferred_employment_status){
      $users = $users->where('preferred_employment_status', $request->preferred_employment_status);
    }
    if($request->preferred_country){
      $users = $users->where('preferred_country', $request->preferred_country);
    }
    if($request->job_position){
      $users = $users->where('job_position', $request->job_position);
    }
    if($request->tenureship){
      $users = $users->where('tenureship', $request->tenureship);
    }
    if($request->job_skills){
    $users = $users->where('job_skills', 'LIKE', '%'.$request->job_skills.'%');
    }

    if($user->user_type == UserType::Worker){
    $job_postings = JobPosting::all();

    if($request->preferred_country){
      $job_postings = $job_postings->where('country', $request->preferred_country);
    }
    if($request->state){
      $job_postings = $job_postings->where('state', 'LIKE', '%'.$request->state.'%');
    }
    if($request->city){
      $job_postings = $job_postings->where('city', 'LIKE', '%'.$request->city.'%');
    }
    if($request->occupation){
      $job_postings = $job_postings->where('occupation', $request->occupation);
    }
    if($request->industry){
      $job_postings = $job_postings->where('industry', $request->industry);
    }
    if($request->preferred_employment_status){
      $job_postings = $job_postings->where('employment_status', $request->preferred_employment_status);
    }
    if($request->salary){
      $job_postings = $job_postings->where('salary', $request->salary);
    }
    return view('home', compact('job_postings', 'userCount','from_user_id', 'countries'));
   }


    return view('home', compact('users', 'userCount', 'from_user_id', 'countries'));
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

    if(!isWorker($user->id)){
      Company::where('user_id', Auth::id())->update(['password' => $user->password]);
    }

    return redirect()->route('home')->with("success","Password successfully changed!");
  }

  public function showAbout(){
    return view('menu_top.about_us');
  }
  public function showFaq(){
    return view('menu_top.faq');
  }
  public function showSearchBox(){
    return view('search.homepage');
  }

  public function userslist(){

    $user = Auth::user();
    $job_postings = JobPosting::latest()->paginate(8);
    $users = User::where('user_type', UserType::Worker)->paginate(8);
    $countries = Country::pluck('name', 'code')->all();

    return view('userslist',['users' => $users, 'user'=>$user, 'job_postings'=>$job_postings, 'countries'=>$countries]);
  }

  public function like($id){
    if(!isWorker(Auth::id())){
      Reaction::create([
        "to_user_id" => $id,
        "from_user_id" => Auth::id(),
        "status" => 0
       ]);
    }else{
      WorkerReaction::create([
        'to_job_id'=> $id,
        'from_worker_id'=> Auth::id(),
        "status" => 0,
      ]);
    }
    return redirect()->back();
  }

  public function dislike($id){
    if(!isWorker(Auth::id())){
      Reaction::create([
        'to_user_id' => $id,
        'from_user_id' => Auth::id(),
        "status" => 1
        ]);
    }else{
      WorkerReaction::create([
        'to_job_id' => $id,
        'from_worker_id' => Auth::id(),
        'status' => 1,
        ]);
    }
    return redirect()->back();
  }

  public function destroy($id){
    if(!isWorker(Auth::id())){
      Reaction::where([
        ['to_user_id', $id],
        ['from_user_id', Auth::id()],
        ])->delete();
    }else{
      WorkerReaction::where([
        ['to_job_id', $id],
        ['from_worker_id', Auth::id()],
        ])->delete();
    }
    return redirect()->back();
  }

}
