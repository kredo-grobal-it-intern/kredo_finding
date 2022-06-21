<?php

namespace App\Services;

class FileUploadServices
{
  public static function fileUpload($imageFile){

    $extension = $imageFile->getClientOriginalExtension();

    $fileData = file_get_contents($imageFile->getRealPath());

    $list = [$extension, $fileData];

    return $list;

  }
}

