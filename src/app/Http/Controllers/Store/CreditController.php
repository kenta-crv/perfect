<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index(){
        return view('store.credit.index');
    }

    public function confirm(){
        return view('store.credit.confirm');
    }

    public function rent(){
        return view('store.credit.rent');
    }
}
