<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = "inquiry";
    protected $casts = [
        'inquiry_type' => 'array',
    ];

    protected $fillable = [
        'inquiry_type',
        'name',
        'email',
        'tel_no',
        'others'
    ];
}
