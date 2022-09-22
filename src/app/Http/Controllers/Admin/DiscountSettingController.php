<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountSettingController extends Controller
{
    public function index(){
        return view('store.discountsetting.index');
    }
}
