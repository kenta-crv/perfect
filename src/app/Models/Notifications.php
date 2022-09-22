<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = "notification";

    protected $fillable = [
        'target_store',
        'date_in',
        'time_in',
        'date_out',
        'time_out',
        'date_content',
        'title',
        'content',
        'flag',
        'mail_flag'
    ];
}
