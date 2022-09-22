<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    //
    protected $table='credit_card';
    public $timestamps=true;

    protected $fillable= [
        'number',
        'name',
        'expire_month',
        'expire_year',
        'security_code',
    ];
}
