<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('store.account.index');
    }

    public function accountmyPage(){
        return view('store.account.mypage');
    }
}
