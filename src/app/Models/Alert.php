<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = "alerts";
    public $timestamps = true;

    protected $fillable = [
        'name',
        'rule',
        'priority',
        'trial_flag' => 'boolean',
        'starter_flag'=> 'boolean',
        'basic_flag'=> 'boolean',
        'enterprise_flag'=> 'boolean',
    ];
}
