<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SettingScrapping;


class MailSendingListHeadquarter extends Model
{
    protected $table = 'mail_sending_list_headquarter';
    protected $fillable = [
        'name',
        'email',
        'group_id'
    ];


    public function scraping_id(){
        return $this->hasMany(SettingScrapping::class, 'account_id', 'id');
    }
}
