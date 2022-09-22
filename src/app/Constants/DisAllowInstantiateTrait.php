<?php


namespace App\Constants;


trait DisAllowInstantiateTrait
{
    private function __construct()
    {
        // 定数クラスをインスタンス化させないため private 属性にする
    }
}