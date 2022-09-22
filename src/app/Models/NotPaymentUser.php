<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotPaymentUser extends Model
{
    protected $table = 'not_payment_user';
    public $timestamps = true;

    protected $fillable = [
        'account_id',
        'amount_id',
        'start_date',
        'end_date'
    ];

    public function accounts(){
        return $this->hasMany(Accounts::class, 'id', 'account_id');
    }
}
