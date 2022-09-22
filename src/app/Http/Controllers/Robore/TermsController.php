<?php

namespace App\Http\Controllers\Robore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index(){
        return view('robore.terms_service');
    }
}
