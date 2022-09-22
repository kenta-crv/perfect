<?php

namespace App\Traits;

trait DownloadFileTrait{
    public function downloadFile($file_name){
        $file_path = public_path('files/'.$file_name);
        return response()->download($file_path);
    }
}
