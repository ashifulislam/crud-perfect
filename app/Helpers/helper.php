<?php

use Illuminate\Support\Facades\Storage;

function uploadFile($file, $destinationPath, $oldFile = null)
{
      if($oldFile != null)
      {
          deleteFile($destinationPath,$oldFile);
      }
      $fileName = $file->getClientOriginalExtension();
    //$uploaded = Storage::put($destinationPath . $fileName, file_get_contents($file-
     $uploaded =  Storage::put($destinationPath. $fileName, file_get_contents($file->getRealPath()));
     if($uploaded == true)
     {
         $image = Image::make(customerImageViewPath() . $fileName)->resize(750, 1250, function ($constraint) {
             $constraint->aspectRatio();
         });
         $image->save(customerImageViewPath() . $fileName);
     }
}

function customerImagePath()
{
    return 'public/customer-image/';
}
function customerImageViewPath()
{
    return 'storage/customer-image/';
}

function deleteFile($destinationPath,$file)
{
    if($file != null){
        try {
            Storage::delete($destinationPath . $file);
        }catch (\Exception $e)
        {

        }
    }

}

