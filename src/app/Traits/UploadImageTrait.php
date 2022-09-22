<?php
namespace App\Traits;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait {

    public function storeImage($path_file, $directory){
        if(isset($path_file)){
            $file = $path_file;
            $fileName = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 16);
            try {
                $url = Storage::disk('s3')->putFile($directory, $file, $fileName);
                $path = Storage::disk('s3')->url($url ? $url : '');
                $photo_path = $directory . mb_substr($path ? $path : '', mb_strrpos($path ? $path : '', "/") + 1);
            } catch (Exception $e) {
                $photo_path = '';
            }
        }
        return $photo_path;

    }

}
