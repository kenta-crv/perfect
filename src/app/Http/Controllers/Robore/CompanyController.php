<?php

namespace App\Http\Controllers\Robore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        return view('robore.company');
    }
}
