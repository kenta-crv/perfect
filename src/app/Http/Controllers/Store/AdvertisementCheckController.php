<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementCheckController extends Controller
{
    public function index(){
        return view('store.advertisementcheck.index');  
    }

    public function advertisementSetting(){
        return view('store.advertisementcheck.setting');
    }

    public function loginSettingforUser(){
        return view('store.advertisementcheck.loginSettingforuser');
    }

    public function scheduleCheck(){
        return view('store.advertisementcheck.schedulecheck');
    }
}
