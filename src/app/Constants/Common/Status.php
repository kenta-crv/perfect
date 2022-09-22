<?php


namespace App\Constants\Common;


use App\Constants\DisAllowInstantiateTrait;
use App\Constants\ConstantsInterface;

class Status implements ConstantsInterface
{
    use DisAllowInstantiateTrait;

    public const STATUS_PUBLISH = 1;
    public const STATUS_PRIVATE = 2;
    public const STATUS_WAITING_REQUEST = 4;
    public const STATUS_PUBLISH_REQUEST = 5;

    public const TO_FORM = [
        self::STATUS_PUBLISH => '公開',
        self::STATUS_PRIVATE => '非公開',
    ];

    public static function toString($type): string
    {
        return $type  ? '公開' : '非公開';
    }


    public static function columns(): array
    {
        return [
            self::STATUS_PUBLISH,
            self::STATUS_PRIVATE
        ];
    }
}
