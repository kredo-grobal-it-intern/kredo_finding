<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\User;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
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

    if(!is_null($request['img_name'])){
      $imageFile = $request['img_name'];

      $list = FileUploadServices::fileUpload($imageFile);
      list($extension, $fileNameToStore, $fileData) = $list;

      $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
      $image = Image::make($data_url);
      $image->resize(400,400)->save(storage_path() . '/app/public/images/' . $fileNameToStore );

      $user->img_name = $fileNameToStore;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->gender = $request->gender;
    $user->self_introduction = $request->self_introduction;

    $user->save();

    return redirect('home');
  }
}

