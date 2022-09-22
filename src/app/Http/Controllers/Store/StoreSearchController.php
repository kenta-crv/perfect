<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreSearchController extends Controller
{
    public function index(){
        return view('store.storesearch.index');
    }

     public function result(){
        return view('store.storesearch.result');
    }
}
