<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    //
    public $table = 'properties';
    public $timestamps = true;
    protected $fillable = [
        'email',
        'contact_no',
        'line_id',
        'fax_no',
        'license_no',
        'no_listed_properties',
        'registered_message',
        'comment_priority',
        'hb_license_no',
        'convey_message',
        'photo_path',
        'photo_file',
        'price',
        'capacity',
        'is_home_page',
        'home_page_url',
        'is_send_alert',
        'comment_pr',
        'items_printed',
        'google_location',
        'postal_code',
        'location',
        'address',
    ];
}
