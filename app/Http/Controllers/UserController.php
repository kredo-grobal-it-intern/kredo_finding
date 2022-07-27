<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\User;
use App\Company;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Constants\UserType;
use App\Country;

class UserController extends Controller
{
  const LOCAL_STORAGE_FOLDER = 'public/images/';
  private $company;
  private $country;

  public function __construct(Company $company, Country $country)
  {
    $this->company = $company;
    $this->country = $country;
  }

  public function show($id)
  {
    $user = User::findorFail($id);

    return view('mypage.profile', compact('user'));
  }

  public function edit($id)
  {
    $user = User::findorFail($id);
    $countries = Country::pluck('name', 'code')->all();

    return view('users.edit', compact('user', 'countries'));
  }

  public function updateUser($id, ProfileRequest $request)
  {

    $user = User::findorFail($id);

    if (!is_null($request['img_name'])) {
      $imageFile = $request['img_name'];

      $list = FileUploadServices::fileUpload($imageFile);
      list($extension, $fileData) = $list;

      $bin_image = CheckExtensionServices::checkExtension($fileData, $extension);

      $user->img_name = $bin_image;
    }else{
      $bin_image = $user->img_name;
    }

    $user->name                        = $request->name;
    $user->email                       = $request->email;
    $user->gender                      = $request->gender;
    $user->self_introduction           = $request->self_introduction;
    $user->contact_number              = $request->contact_number;
    $user->address1                    = $request->address1;
    $user->address2                    = $request->address2;
    $user->city                        = $request->city;
    $user->state                       = $request->state;
    $user->country                     = $request->country;
    $user->zipcode                     = $request->zipcode;

    $user->save();

    if($user->user_type == UserType::Company){
      $this->company->updateCompany($request, $bin_image);
    }

    return redirect('home');
  }

  public function updateJob($id, Request $request)
  {
    $user = User::findorFail($id);

    $user->preferred_country           = $request->preferred_country;
    $user->preferred_state             = $request->preferred_state;
    $user->company_name                = $request->company_name;
    $user->occupation                  = $request->occupation;
    $user->preferred_employment_status = $request->preferred_employment_status;
    $user->job_position                = $request->job_position;
    $user->tenureship                  = $request->tenureship;
    $user->job_skills                  = $request->job_skills;
    $user->job_experiences             = $request->job_experiences;

    $user->save();

    return redirect('home');
  }
  public function destroy(Request $request, $id)
  {
    $user = User::find($id);
    if (is_null($user->img_name)) {
      return redirect()->back();
    }

    $user->img_name = null;
    $user->save();

    if($user->user_type == UserType::Company){
      Company::where('user_id', Auth::id())->update(['img_name' => null]);
    }

    return redirect()->back();
  }
}
