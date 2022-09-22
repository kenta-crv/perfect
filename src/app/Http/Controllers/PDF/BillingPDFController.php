<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingPDFController extends Controller
{
    public function billingpdf(){
        return view ('store.pdf.billingpdf');
    }
}
