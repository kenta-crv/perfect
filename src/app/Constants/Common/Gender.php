<?php


namespace App\Constants\Common;


use App\Constants\DisAllowInstantiateTrait;
use App\Constants\ConstantsInterface;

class Gender implements ConstantsInterface
{
    use DisAllowInstantiateTrait;

    public const MALE = 1;
    public const FEMALE = 2;

    public const TO_FORM = [
        self::MALE => '男',
        self::FEMALE => '女',
    ];

    public static function toString($type): string
    {
        return $type  ? '男' : '女';
    }


    public static function columns(): array
    {
        return [
            self::MALE,
            self::FEMALE,
        ];
    }
}
