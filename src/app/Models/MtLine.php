<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MtLine extends Model
{
    protected $table = "m_line";

    protected $fillable = [
        'line_cd',
        'company_cd',
        'line_name',
        'line_name_k'
    ];
}
