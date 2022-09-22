<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unreads extends Model
{
    protected $table = "unreads";
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'alerts_id',
        'read_flag'
    ];
}
