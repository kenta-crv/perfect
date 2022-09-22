<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class MtCities extends Model
{
    protected $table = "mt_cities";

    protected $fillable = [
        'address_code',
        'prefecture_code',
        'area_code',
        'cities_code',
        'cities_name',
        'cities_name_k',
        'area_name'
    ];
}
