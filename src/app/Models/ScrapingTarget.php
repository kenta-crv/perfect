<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScrapingTarget extends Model
{
    //
    protected $table = 'setting_scraping_target';
    public $timestamps = true;

    protected $fillable = [
        'account_id',
        'site_id',
    ];

    public function accounts(){
        return $this->hasMany(Accounts::class, 'id', 'account_id');
    }

}
