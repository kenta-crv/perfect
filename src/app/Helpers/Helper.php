<?php

namespace App\Helpers;

use Carbon\Carbon;
use Storage;
use Route;
use App\Models\Contact;
use App\Models\Accounts;

class Helper
{

    public const MAN = 1;
    public const FEMALE = 2;

    public const IS_GENDER = [
        self::MAN => '男性',
        self::FEMALE => '女性',
    ];


    public const MAIL_RECIVE = 1;
    public const MAIL_NOT_RECIVE = 2;

    public const MAIL_MAGAGINE = [
        self::MAN => '受け取る',
        self::FEMALE => '受け取らない',
    ];

    public const PACHINKO = 1;
    public const SLOT = 2;
    public const PACHISLO = 3;
    public const INEXPERIENCE = 4;

    public const INTEREST_LIST = [
        self::PACHINKO => 'パチンコ派',
        self::SLOT => 'スロット派',
        self::PACHISLO => '両方',
        self::INEXPERIENCE => '未経験',
    ];

    /**
     * 性別
     */
    public static function gender_type($gender)
    {
        return self::IS_GENDER [$gender];
    }

    public static function interest_type($value)
    {
        return self::INTEREST_LIST [$value];
    }

    public static function magazine_type($value)
    {
        return self::MAIL_MAGAGINE [$value];
    }

    /**
     * 都道府県
     */
    public static function prefNameFormat($value)
    {
        return filled($value)? config('prefecture.PREFECTURE') [$value] : "未設定";
    }

    /**
     * 名前
     */
    public static function FullName($last_name, $first_name)
    {
        return isset($last_name) || isset($first_name) ? $last_name. ' '. $first_name : '未設定';
    }

    public static function FullNameKana($last_name_kana, $first_name_kana)
    {
        return isset($last_name_kana) || isset($first_name_kana) ? $last_name_kana. ' '. $first_name_kana : '未設定';
    }

    //一時URL取得
    public static function getAudioFile($url)
    {
        return Storage::disk('s3')->temporaryUrl($url, Carbon::now()->addMinute(30));
    }

    public static function getMovieFile($url)
    {
        return Storage::disk('s3')->temporaryUrl($url, Carbon::now()->addMinute(30));
    }

    public static function getCount(){
        return Contact::where('status','=','3')->count();
    }
    public static function getStoreId(){
        return Accounts::find(session()->get('LoggedUser'))->store_id;
    }

    public static function getTopPage(){
        $current_route = Route::currentRouteName();

        if (str_contains($current_route, 'store')) {
            return route('storeAdmin.home');

        }elseif (str_contains($current_route, 'admin')) {
            return route('admin.index');

        }else {
            return route('home');
        }
    }

    public function getPropertySiteName($property)
    {
        if(array_key_exists('image_number', $property)){
            return 'atbb';

        }
        elseif(array_key_exists('内見開始日', $property)){
            return 'itandibb';

        }
        elseif(array_key_exists('手数料', $property)){
            return 'tokyu';

        }
        elseif(array_key_exists('案内可能日', $property)){
            return 'mitsui';

        }
        elseif(array_key_exists('構造 規模', $property)){

            return 'sumitomo';
        }else{
            return 'reins';

        }


    }

    public function getUserSiteAccount($site_name)
    {
        $user_id =  auth()->guard('account')->user()->id;
        $site_id = array_search($site_name, array_keys(config('const.sample_requests2')));
        $user_account = Accounts::find($user_id)->scraping_id->where('site_id', $site_id)->first();
        if($user_account != null){
            return [
                'user_name' => $user_account->login_id,
                'user_pass' => $user_account->password
            ];
        }
    }

}
