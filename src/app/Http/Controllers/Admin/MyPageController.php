<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AccountState;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.mypage.index',[
                'admin' => $admin,
            ]);
        }

    }

    public function dormant(Request $request, $id){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else {
            $account_state = AccountState::create([
                'account_id' => $id,
                'state' => 1,
                'dormant_date' => date('Y-m-d'),
            ]);
            return view('admin.mypage.dormant', [
                'account_state' => $account_state
            ]);
        }

    }



    public function cancel(Request $request, $id){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            $account = AccountState::create([
                'account_id' => $id,
                'state' => 3,
                'cancel_date' => date('Y-m-d'),
            ]);
            return view('admin.mypage.cancel', [
                'account_state' => $account
            ]);
        }
    }



    public function restarting(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            $account = AccountState::create([
                'account_id' => $request->session()->get('LoggedUser'),
                'state' => 2,
                'restart_date' => date('Y-m-d'),
            ]);
            return view('admin.mypage.restarting');
        }

    }


    public function edit($id){
        $admin = Admin::find($id);
        return view('admin.mypage.edit',[
            'admin' => $admin,
        ]);
    }

    public function update(Request $request){
        $admin_account = Admin::find($request->mypage_id);
        $admin_account->last_name = $request->input('last_name');
        $admin_account->first_name = $request->input('first_name');
        $admin_account->email = $request->input('email');
        $admin_account->password = $request->input('password');
        $admin_account->save();

        return redirect('admin/mypage');
    }
}
