<?php

namespace App\Helpers;

use Image;
use Input;

trait UploadTrait {
    /**
     * Upload the file with slugging to a given path
     *
     * @param UploadFile $image
     * @param $path
     * @return $filename
     */

    public function uploadImage($file, $existFile='', $path, $width=0, $height=0)
    {

        if (Input::hasFile($file))
        {
            $image = Input::file($file);          
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path($path);
            
            if(!is_dir($destinationPath))
            {
                mkdir($destinationPath, 0777);
                chmod($destinationPath, 0777);
            }

            $img = Image::make($image->getRealPath());
            
            if($width == 0) { $width = 200; }
            if($height == 0) { $height = 200; }

            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            chmod($destinationPath.'/'.$input['imagename'], 0777);

            $image->move($destinationPath, $input['imagename']);

            if($existFile != '' && file_exists($destinationPath .'/'.$existFile))
            {
                chmod($destinationPath.'/'.$existFile, 0777);
                unlink($destinationPath .'/'.$existFile);
            }
            return $input['imagename'];
        }else
            return $existFile;
    
    }

    public function uploadFile($file, $existFile="", $path)
    {
        if (Input::hasFile($file))
        {
            $file = Input::file($file);
            $input['filename'] = time().'.'.$file->getClientOriginalExtension();
         
            $destinationPath = storage_path($path);

            if(!is_dir($destinationPath))
            {
                mkdir($destinationPath, 0777);
                chmod($destinationPath, 0777);
            }

            $file->move($destinationPath, $input['filename']);

            chmod($destinationPath.'/'.$input['filename'], 0777);

            if($existFile != '' && file_exists($destinationPath .'/'.$existFile))
            {
                chmod($destinationPath.'/'.$existFile, 0777);
                unlink($destinationPath .'/'.$existFile);
            }

            return $input['filename'];
        }

        return $existFile;
    }

    public function removeUploadFile($file, $path)
    {
        $storage_path = storage_path($path);
        if($file != '' && file_exists($storage_path .'/'.$file))
        {
            chmod($storage_path .'/'.$file, 0777);
            return unlink($storage_path .'/'.$file);
        }
        return;
    }
}