<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\PasswordResetNotification;
use App\Notifications\UserVerifyEmail;
use App\Traits\GetImageTrait;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Crypt;
use Exception;
use App\Traits\UserTrait;
use Carbon\Carbon;
use App\Models\SettingScrapping;
use App\Models\BillingUser;


class Accounts extends Authenticatable implements MustVerifyEmail
{
    //

    // use Notifiable;
    // use CanResetPassword;
    // use SoftDeletes;
    // use GetImageTrait;
    // use HasFactory;
    use Notifiable;

    protected $table = 'accounts';
    protected $fillable = [
        'group_id',
        'store_id',
        'user_id',
        'email',
        'password',
        'license',
        'company_name',
        'address',
        'first_name',
        'last_name',
        'plans',
        'tel',
        'payment_method',
        'status',
        'last_access_datetime',
        'contract_number',
        'contract_id',
        'contract_card_id',
        'headquarter_flag'

    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new UserVerifyEmail());
    }

    public function scraping_id(){
        return $this->hasMany(SettingScrapping::class, 'account_id', 'id');
    }

    public function not_payment_id(){
        return $this->hasMany(NotPaymentUser::class, 'account_id', 'id');
    }


    public function billing(){
        return $this->hasMany(BillingUser::class, 'account_id', 'id');
    }

    public function getNameAttribute()
    {
        return $this->last_name;
    }

    // public function isPlanMax(){
    //     // if($this->plan == 1)
    //         if($accounts < 1){
    //             return true;
    //         }elseif($accounts <= 3){
    //             return true;
    //         }return
    //     // }    
    // }
    
}
