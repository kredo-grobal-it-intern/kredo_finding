<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Company;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Constants\UserType;
use App\Mail\RegisterUserAccountMail;
use Illuminate\Support\Facades\Mail;

use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  protected $user;
  protected $company;

  public function __construct(User $user, Company $company)
  {
    $this->middleware('guest');
    $this->user = $user;
    $this->company = $company;
  }

  public function showCompanyRegister(){
    return view('companies/register');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'contact_number' => ['nullable', 'string', 'max:11', 'unique:users'],
      'img_name' => ['file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2000'],
      'self_introduction' => ['string', 'max:255'],
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */

  protected function create(array $data)
  {
    if (!empty($data['img_name'])){

      $imageFile = $data['img_name'];

      $list = FileUploadServices::fileUpload($imageFile);

      list($extension, $fileData) = $list;

      $bin_image = CheckExtensionServices::checkExtension($fileData, $extension);

    } else {
      $bin_image = NULL;
    }

    if(empty($data['gender'])){
      $data['gender'] = NULL;
    }

    $create_user = $this->user->createUser($data, $bin_image);

    $user = User::find($create_user->id);
    $name = $user->name;
    $email = $user->email;

    if(!isWorker($user->id)){
      $this->company->createCompany($user, $bin_image);
    }

    Mail::send(new RegisterUserAccountMail($user));
    return $create_user;
  }
}
