<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Search extends Model
{
    use GetImageTrait;
    // use SoftDeletes;

    protected $table = "search";
    // protected $casts = [
    //     'target_site' => 'array',
    // ];
    protected $fillable = [
        'target_site',
        'account_id',
        'railway_name',
        'station',
        'city',
        'town',
        'name',
        'fee_min',
        'fee_max',
        'area_min',
        'area_max',
        'year_build_start',
        'year_build_end',
        'keyword',
        'publishing_date',
        'building_structure',
        'image_flag',
        'drawing_flag',
        'plan_of_house',
        'trade_style_id',
        'search_name',
        'step_min',
        'step_max',
        'plan_of_rent_fee_id',
        'step_flag'
    ];

}
