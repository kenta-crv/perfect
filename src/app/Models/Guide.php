<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = 'mt_guide';
    public $timestamps = true;
    protected $fillable = [
        'guide_name',
        'guide_place',
        'guide_body',
        'target'
    ];
}
