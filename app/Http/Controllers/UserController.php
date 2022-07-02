<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\User;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  const LOCAL_STORAGE_FOLDER = 'public/images/';
  public function show($id)
  {
    $user = User::findorFail($id);

    return view('users.show', compact('user'));
  }

  public function edit($id)
  {
    $user = User::findorFail($id);

    return view('users.edit', compact('user'));
  }

  public function update($id, ProfileRequest $request)
  {

    $user = User::findorFail($id);

    if (!is_null($request['img_name'])) {
      $imageFile = $request['img_name'];

      $list = FileUploadServices::fileUpload($imageFile);
      list($extension, $fileData) = $list;

      $bin_image = CheckExtensionServices::checkExtension($fileData, $extension);

      $user->img_name = $bin_image;
    }

    $user->name              = $request->name;
    $user->email             = $request->email;
    $user->gender            = $request->gender;
    $user->self_introduction = $request->self_introduction;
    $user->address1          = $request->address1;
    $user->address2          = $request->address2;
    $user->city              = $request->city;
    $user->state             = $request->state;
    $user->country           = $request->country;
    $user->zipcode           = $request->zipcode;

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

    return redirect()->back();
  }
}
