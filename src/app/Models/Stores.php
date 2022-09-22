<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = "stores";

    protected $fillable = [
        'company_name',
        'address',
        'tel_no',
        'person_in_charge',
        'email',
        'password',
        'payment_method'
    ];
}
