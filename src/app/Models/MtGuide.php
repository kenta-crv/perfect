<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class MtGuide extends Model
{
    protected $table = "mt_guide";

    protected $fillable = [
        'guide_name',
        'guide_place',
        'guide_body',
        'target'
    ];
}
