<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\PasswordResetNotification;
use App\Notifications\ContactEmail;
use App\Traits\GetImageTrait;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Crypt;
use Exception;
use App\Traits\UserTrait;
use Carbon\Carbon;

class Contact extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = [
        'company_name',
        'license',
        'tel',
        'prefecture',
        'last_name',
        'first_name',
        'email',
        'body',
    ];
    public function sendEmailVerificationNotification()
    {
        $this->notify(new ContactEmail());
    }
}
