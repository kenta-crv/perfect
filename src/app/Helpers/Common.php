<?php
namespace App\Helpers;

use Carbon\Carbon;

class Common
{
    /**
     * 配列変換関数
     *
     * 半角スペース || 全角スペースを配列変換
     */
    function space_array_conversion(String $keyword) {
        $half_space_string = mb_convert_kana($keyword, "s"); // 全角スペースを半角スペースに置換
        $search_array = explode(" ", $half_space_string); // 配列に変換
        return $search_array;
    }

    /**
     * TIME型の表示用
     */
    function disp_time_format($value) {
        if (!$value) return '';
        //h:i:s固定のため、先頭の5文字をとる
        return substr($value, 0, 5);
    }

}
