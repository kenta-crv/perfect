<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountState;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;
use App\Models\ScrapingTarget;
use Illuminate\Support\Facades\Auth;
class MyPageController extends Controller
{
    public function index(Request $request){
        // $user = session()->get('LoggedUser');
        // $request->session()->forget(['storeLastname','storeFirstname']);
        // dd($value);
        $user = Accounts::find($request->session()->get('LoggedUser'));
        $account_id = session()->get('LoggedUser');
        $site = ScrapingTarget::where('account_id', $account_id)->get();
        // dd($site);
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.mypage.index',[
                'users' => $user,
                'sites' => $site
            ]);
        }

    }

    public function roborestaff(){
        return view('store.mypage.roborestaff');
    }

    public function cancel(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.mypage.cancel');
        }

    }

    public function cancelConfirm(){
        return view('store.mypage.cancelConfirm');
    }

    public function cancelComplete(){
        $account = AccountState::create([
            'account_id' => session()->get('LoggedStoreUser'),
            'state' => 3,
            'dormant_date' => date('Y-m-d'),
        ]);
        return view('store.mypage.cancelComplete');
    }

    public function resume(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.mypage.resume');
        }

    }

    public function resumeConfirm(){
        return view('store.mypage.resumeConfirm');
    }

    public function resumeComplete(){
        
        $user = Auth::guard('account')->user();
        
        $account = AccountState::create([
            'account_id' => $user->id,
            'state' => 2,
            'dormant_date' => date('Y-m-d'),
        ]);
        return view('store.mypage.resumeComplete');
    }

    public function storeSetting(){
        return view('store.mypage.storeSetting');
    }

    public function dormant(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.mypage.dormant');
        }

    }

    public function dormantConfirm(){
        return view('store.mypage.dormantConfirm');
    }

    public function dormantComplete(){
        $account = AccountState::create([
            'account_id' => session()->get('LoggedStoreUser'),
            'state' => 1,
            'dormant_date' => date('Y-m-d'),
        ]);
        return view('store.mypage.dormantComplete');
    }

    public function updateData(Request $request){
        // $id = $request->account_id
        $request->session()->put('storeLastname', $request['last_name']);
        $request->session()->put('storeFirstname', $request['first_name']);

        // dd($value);
        $input = $request->all();
        // dd($input);
        if(!empty($request->password)){
            $input['password'] = Hash::make($request->input('password'));
        }
        else{
            unset($input['password']);
        }

        $account = Accounts::find($input['account_id']);
        $account->update($input);
        return redirect('store/mypage');
    }

    public function changepassword(Request $request){
        $input = $request->all();
        $account = Accounts::find($input['account_id']);
        if(Hash::check($request->current_password, $account->password)){
            $account->fill([
                $input['password'] = Hash::make($request->input('password'))
            ])->update($input);
            return redirect('store/setting/user');
        }else{
            return back()->with('fail', '現在のパスワードが正しくない');
        }
    }

}
