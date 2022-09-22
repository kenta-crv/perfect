<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingUser extends Model
{
    protected $table = "billing_user";
    public $timestamps = true;

    protected $fillable = [
        'account_id',
        'plan_id',
        'billing_date',
        'add_user_fee',
        'add_property_fee'
    ];
}
