<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\PasswordResetNotification;
use App\Notifications\RequestInformationEmail;
use App\Traits\GetImageTrait;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Crypt;
use Exception;
use App\Traits\UserTrait;
use Carbon\Carbon;
class RequestInformation extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    protected $table = "request_informations";

    protected $fillable = [
        'license',
        'tel',
        'prefecture',
        'company_name',
        'last_name',
        'first_name',
        'email',
        'body',
        'status1',
        'status2',
        'status3',
        'status4'
    ];

    public function sendRequestInformationEmailNotification()
    {
        $this->notify(new RequestInformationEmail());
    }
}
