<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class LimitedController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.limited.index');
        }
        
    }
}
