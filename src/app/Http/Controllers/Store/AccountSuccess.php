<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountSuccess extends Controller
{
    public function accounts_success(){
        return view('livewire.user.accounts_success');
    }
}
