<?php

namespace App\Http\Controllers\Robore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(){
        return view('robore.privacy_policy');
    }
}
