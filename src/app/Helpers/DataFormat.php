<?php

namespace App\Helpers;

use Carbon\Carbon;

class DataFormat
{
    /**
     * 数値のフォーマット指定
     */

    public static function custom_number_format($val, $digit = 0, $type = '')
    {
        $mul = 1;
        // 百分率の場合
        if (!empty($type) && $type == '%') {
            $mul = 100;
        }

        return number_format($val * $mul, $digit);
    }

    /**
     * 単位をMnとする箇所に使用
     */
    public static function custom_number_format_to_mn($val, $digit = 2)
    {
        return number_format($val / 1000000, $digit);
    }
    /**
     * DBからの日付表示フォーマット
     */
    // 2020年12月25日
    public static function custom_format_for_date($date)
    {
        Carbon::setLocale('ja');
        $carbon = Carbon::parse($date)->isoFormat('YYYY.MM.DD');
        return $carbon;
    }

    // 2020/12/25
    public static function format_date($date)
    {
        $carbon = Carbon::parse($date);
        return$carbon->format('Y/m/d');
    }

    public static function format_time($time)
    {
        $carbon = Carbon::parse($time);
        return$carbon->format('H:i');
    }

    public static function format_number($value)
    {
        return number_format($value,1,null,'');
    }

    public static function commaFormat($value)
    {
        return number_format($value);
    }

    public static function moneyFormat($value)
    {
        return round(( $value /(10000)),2);
    }


    /**
     * 誕生日・年齢フォーマット
     */
    public static function birth_date($year,$month,$day)
    {
        $birth_date = Carbon::create($year,$month,$day);
        return  $birth_date->format('Y/m/d').'（'.(Carbon::parse($birth_date)->age.'歳').'）';
    }

    /**
     * 0割りチェック
     */
    public static function check_zero_devide($numerator, $denominator)
    {
        // 分母が0の場合
        if ($denominator == 0) {
            return 0;
        }

        return $numerator / $denominator;
    }

}
