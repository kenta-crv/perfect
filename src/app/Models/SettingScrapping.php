<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accounts;

class SettingScrapping extends Model
{
    protected $table = "setting_scraping_id";
    public $timestamps = true;
    public $fillable = [
        'account_id',
        'login_id',
        'password',
        'site_id',
    ];

    public function accounts(){
        return $this->belongsTo(Accounts::class, 'account_id', 'id');
    }
}
