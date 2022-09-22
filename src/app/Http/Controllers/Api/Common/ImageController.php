<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request, $pathname)
    {
        // ディスクの指定
        $disk = Storage::disk('s3');
        // ファイルパスの指定
        $filePath = '/'.$pathname;
        $image = $request->file('up_file');
        $access = $request->get('access', 'private');
        // putメソッドでファイル内容をディスクに保存
        $url = $disk->put($filePath, $image, $access);
        if ($access === "public") {
            $imagePath = $disk->url($url);
        } else {
            $imagePath = $disk->temporaryUrl($url, now()->addMinutes(1));
        }

        return response()->json([
            'message' => 'ok',
            'path' => $imagePath,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
