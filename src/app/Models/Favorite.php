<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
class Favorite extends Model
{
    use GetImageTrait;
    use SoftDeletes;

    protected $table = "favorites";
    // protected $casts = [
    //     'target_site' => 'array',
    // ];
    protected $fillable = [
        'quiz_id',
        'user_id',
        'target_site',
    ];

    public function quizes(){
        return $this->hasMany(QuizInformation::class, 'id', 'quiz_id');
    }


}
