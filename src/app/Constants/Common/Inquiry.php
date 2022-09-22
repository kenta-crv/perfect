<?php


namespace App\Constants\Common;


use App\Constants\ConstantsInterface;
use App\Constants\DisAllowInstantiateTrait;


class Inquiry implements ConstantsInterface
{
    use DisAllowInstantiateTrait;

    public static function toString($type): string
    {
        // TODO: Implement toString() method.
    }


    public static function columns(): array
    {
        // TODO: Implement columns() method.
    }
}