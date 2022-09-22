<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    //
    protected $table = 'manual';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'scene',
        'url',
        'file_name',
    ];
}
