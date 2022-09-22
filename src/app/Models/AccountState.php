<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountState extends Model
{
    protected $table = 'account_state';
    protected $fillable = [
        'account_id',
        'state',
        'dormant_date',
        'restart_date',
        'cancel_date',
    ];
}
