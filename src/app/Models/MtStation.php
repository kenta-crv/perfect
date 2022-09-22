<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MtStation extends Model
{
    protected $table = 'mt_stations';
    public $timestamps = true;
    protected $fillable = [
        'station_cd',
        'station_g_cd',
        'station_name',
        'station_name_k',
        'line_cd',
        'pref_cd'
    ];
}
