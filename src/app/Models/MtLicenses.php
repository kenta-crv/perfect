<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MtLicenses extends Model
{
    protected $table = "mt_license";

    protected $fillable = [
        'license',
        'company_name'
    ];
}
