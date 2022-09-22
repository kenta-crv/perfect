<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MtRailwayCompany extends Model
{
    protected $table = "mt_railway_company";

    protected $fillable = [
        'company_cd',
        'company_name',
        'company_name_k',
        'company_name_r',
    ];
}
