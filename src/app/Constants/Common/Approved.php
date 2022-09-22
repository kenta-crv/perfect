<?php


namespace App\Constants\Common;


use App\Constants\DisAllowInstantiateTrait;
use App\Constants\ConstantsInterface;

class Approved implements ConstantsInterface
{
    use DisAllowInstantiateTrait;

    public const WAITING_REQUEST = 1;
    public const APPROVED_REQUEST = 2;
    public const NOT_APPROVED_REQUEST = 3;

    public const TO_FORM = [
        self::STATUS_PUBLISH => '公開',
        self::STATUS_PRIVATE => '非公開',
    ];

    public static function toString($type): string
    {
        // return $type  ? '公開' : '非公開';
    }


    public static function columns(): array
    {
        return [
            self::STATUS_PUBLISH,
            self::STATUS_PRIVATE
        ];
    }
}
