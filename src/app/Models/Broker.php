<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $table = "broker";

    protected $fillable = [
        'license_number',
        'company_name',
        'address',
        'contact_no',
        'person_in_charge',
        'payment_method',
        'email',
        'password'
    ];
}
