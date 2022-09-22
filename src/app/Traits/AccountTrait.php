<?php

namespace App\Traits;

use App\Models\Accounts;
use Carbon\Carbon;
use Storage;

trait AccountTrait
{
    public function accountSearch($request)
    {
        //Search Request
        $keyword = "";

        //Query Init
        $isKeyword = isset($request['keyword']) && $request['keyword'] != null;

        $accounts = Accounts::orderBy('created_at', 'DESC')->paginate(20);
        if ( $isKeyword ){
            $keyword = $request['keyword'];
            $searchKey = "%{$keyword}%";
            $accounts = Accounts::orderBy('created_at', 'DESC')->where('last_name', 'LIKE BINARY', $searchKey)
            ->orWhere('first_name', 'LIKE BINARY', $searchKey)
            ->orWhere('last_name_kana', 'LIKE BINARY', $searchKey)
            ->orWhere('first_name_kana', 'LIKE BINARY', $searchKey)
            ->orWhere('nickname', 'LIKE BINARY', $searchKey)
            ->orWhere('email', 'LIKE BINARY', $searchKey)
            ->orWhere('tel', 'LIKE BINARY', $searchKey)
            ->paginate(7);
        }

        return [
            'accounts' => $accounts,
            'queries' => ['keyword' => $keyword]
        ];
    }
}
