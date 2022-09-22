<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Admin;
class InquiryResponseController extends Controller
{
    public function index(Request $request){

        $contacts = Contact::all();
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.inquiryresponse.index',[
                'contacts' => $contacts,
            ]);
        }
        
    }
}
