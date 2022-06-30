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
    $request->validate([
         'name'         => 'min:1|max:50|nullable',
         'email'        => 'email|max:50|nullable',
         'img_name'     => 'mimes:jpg,jpeg,png,gif|max:1048',
         'address1'     => 'min:1|max:50|nullable',
         'city'         => 'min:1|max:50|nullable',
         'state'        => 'min:1|max:50|nullable',
         'country'      => 'min:1|max:50|nullable',
         'zipcode'      => 'min:1|max:7|nullable'
    ]);

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
      $this->deleteImage($user->image);

      $user->image = $this->saveImage($request);
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

  private function deleteImage($image_name)
    {
        $image_path = Self::LOCAL_STORAGE_FOLDER . $image_name;

        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }


    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user->img_name)) {
            return redirect()->back();
        }
        Storage::disk('public')->delete('public/images/'.$user->img_name);
        $user->img_name = null;
        $user->save();

        return redirect()->back();
    }
}
