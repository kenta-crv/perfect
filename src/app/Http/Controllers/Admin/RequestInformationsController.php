<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestInformation;
use App\Models\Admin;
class RequestInformationsController extends Controller
{
    public function index(Request $request){

        $request_informations = RequestInformation::all();
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.requestInformations.index',[
                'request_informations' => $request_informations,
            ]);
        }
        
    }
}
