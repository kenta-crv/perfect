<?php


namespace App\Constants;


interface ConstantsInterface
{
    public static function toString($type): string;
    public static function columns(): array;
}