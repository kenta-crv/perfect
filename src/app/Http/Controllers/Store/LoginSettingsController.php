<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginSettingsController extends Controller
{
    //
    public function index(){
        return view('store.loginSettings.index');
    }
}
