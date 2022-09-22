<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
class AccountManagementController extends Controller
{
    public function index(Request $request)
    {
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.account.index');
        }
        
    }

    public function edit(Request $request){
        $admin = Admin::find($request->id);
        $adminChecked = Admin::find($request->session()->get('LoggedUser'));
        if($adminChecked == null){
            return redirect(route('admin.login'));
        }else{
            return view('livewire.admin.account.update',[
                'admin' => $admin,
            ]);
        }
        
    }

    public function delete(Request $request){
        // dd($request->all());
        $admin = Admin::find($request->id);
        $admin->delete();

        return redirect()->route('admin.account.index')->with(['message' => 'アカウントの削除に成功']);
    }

    public function update(Request $request){

        $admin_account = Admin::find($request->mypage_id);
        $admin_account->last_name = $request->input('last_name');
        $admin_account->first_name = $request->input('first_name');
        
        if($request->input('password') != null){
            $admin_account->password = Hash::make($request->input('password'));
        }
        
        $admin_account->email = $request->input('email');
        $admin_account->save();
       

        if($admin_account->password != ''){
            return Redirect::back()->with('message','Password updated successfully!');
        }
        else{
            return redirect('admin/account');
        }
    }

   

    public function createAccount(Request $request){

        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'email|unique:administrator'
        ]);

        $admin = new Admin;
        $admin->last_name = $request->last_name;
        $admin->first_name = $request->first_name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->selected_role;
        $admin->save();
        return redirect('admin/account');
    }
    
    public function create(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.account.create');
        }
    }

}
