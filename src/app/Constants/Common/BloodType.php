<?php


namespace App\Constants\Common;


use App\Constants\DisAllowInstantiateTrait;
use App\Constants\ConstantsInterface;

class BloodType implements ConstantsInterface
{
    use DisAllowInstantiateTrait;

    public const UNKNOWN = 0;
    public const A = 1;
    public const B = 2;
    public const O = 3;
    public const AB = 4;

    public const TO_FORM = [
        self::UNKNOWN => '不明',
        self::A       => 'A型',
        self::B       => 'B型',
        self::O       => 'O型',
        self::AB      => 'AB型',
    ];


    public static function toString($type): string
    {
        switch ($type) {
            case self::A:
                return 'A型';
            case self::B:
                return 'B型';
            case self::O:
                return 'O型';
            case self::AB:
                return 'AB型';
            default:
                return '不明';
        }
    }


    public static function columns(): array
    {
        return [
            self::UNKNOWN,
            self::A,
            self::B,
            self::O,
            self::AB,
        ];
    }
}