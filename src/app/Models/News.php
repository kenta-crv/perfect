<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
class News extends Model
{
    use GetImageTrait;
    protected $table = 'news';
    protected $guarded = [
        '_token',
    ];

    protected $casts = [
        'release_date' => 'datetime',
     ];
    protected $fillable = [
        'user_id',
        'title',
        'status',
        'release_date',
        'photo_path',
        'body',
    ];

    public function getImageAttribute()
    {
        if (!$this->photo_path) {
            return "";//asset('image/icon/icon_image.svg'); //TODO: とりあえず空にしてある。
        } else {
            return $this->getTemporaryImageUrl($this->photo_path);
        }
    }

    public function getDateFormatAttribute(){
        return $this->release_date->format('Y-m-d');
    }

}
