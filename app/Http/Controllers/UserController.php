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

    if(!is_null($request['img_name'])){
      $imageFile = $request['img_name'];

      $list = FileUploadServices::fileUpload($imageFile);
      list($extension, $fileNameToStore, $fileData) = $list;

      $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
      $image = Image::make($data_url);
      $image->resize(400, 400, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      }
    );

      $image->save(storage_path() . '/app/public/images/' . $fileNameToStore);

      $user->img_name = $fileNameToStore;
    }

    if ($request->image) {
      // Delete the previous image from the local storage
      $this->deleteImage($user->image);

      // Move the new image to the local storage
      $user->image = $this->saveImage($request);
  }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->gender = $request->gender;
    $user->self_introduction = $request->self_introduction;

    $user->save();

    return redirect('home');
  }

  private function deleteImage($image_name)
    {
        $image_path = Self::LOCAL_STORAGE_FOLDER . $image_name;
        // $image_name = "public/images/167862457.jpg";

        // If the image is existing, delete.
        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }

    public function destroy(User $user)
    {
        $path = $user->img_name;
        if($path !== ''){
          \Storage::disk('public')->delete($path);
        }
        $user->delete();
        return redirect()->back();
    }
}
