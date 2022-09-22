<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class StoreSettingsController extends Controller
{
    //
    public function index(Request $request){
        $auth = Auth::guard('account')->user();
        
        $auth = Accounts::find($request->session()->get('LoggedStoreUser'));
        // temporary group_id is logged in user group_id if no auth, group_id = 0
        $headquarter_group_id = $request->session()->has('LoggedStoreUser') ? $auth->group_id : 1;
        //display accounts table where group_id = this logged in headquater.group_id
        
        
        if($auth->plans == 1){
            $max_user = 1;
        }else{
            $max_user =  3;
        }
        $accData =  Accounts::where('group_id', $headquarter_group_id)
        ->where('group_id', '!=' , 0)
        //->where('store_id', '=', 1)
        //->where('id', '!=', $auth->id)
        //->limit($max_user) // temporary for existing users with over max user accounts
        ->get();
        $totalAcc =  $accData->count();
        // dd($accData->isPlanMax());
        $totalAccount = Accounts::count();
        $countStarter = Accounts::where('plans', 1)->count();
        $countBasic = Accounts::where('plans', 2)->count();
        $totalPlans = $countStarter + $countBasic;
        $totalAll = $totalAcc;
        // dump('totalAcc: '. $totalAcc);
        // dump('totalAccount: '. $totalAccount);
        // dump('countStarter: '. $countStarter);
        // dump('countBasic: '. $countBasic);
        // dump('totalPlans: '. $totalPlans);
        // dd('totalAll: '. $totalAll);
        // return response()->json($totalFinal);
        // dump('stater ni'. $countStarter);
        // dump('basic ni'. $countBasic);
        // dump('total plans'. $totalPlans);
        // dump($totalAll);
        // dd($totalAccount);
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.storeSettings.index', compact('accData','totalAcc', 'totalAll', 'countStarter', 'countBasic', 'max_user'));
        }


    }

    public function setting(){
        return view('store.storeSettings.setting');
    }

    public function mypage(){
        return view('store.storeSettings.mypage');
    }

    public function delete($id){
        $data = Accounts::find($id);
        $data->delete();
        return redirect('/store/setting/user');

    }

    public function edit($id){

    $userData =  Accounts::where('id', $id)->first();

    return view('store.storeSettings.update',compact('userData'));

    }

    public function update(Request $request, $id){

        $user = Accounts::find($id);
        $user->company_name = $request->input('company');
        $user->address = $request->input('address');
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
        $user->update();
        return redirect('/store/setting/user')->with('status','User Updated Successfully');
    }

    public function create(Request $request){
        $headquarter_group_id = $request->session()->get('group_id');
        $accounts = Accounts::where('email', $request->email)->get();
        if(count($accounts) != 0){
            foreach($accounts as $account){
                if ($account && Hash::check($request->password, $account->password)) {
                    $validator = Validator::make($request->all(), [
                        'last_name' => 'required',
                        'first_name' => 'required',
                        'email' => 'required|email|unique:accounts,email',
                        'password' => 'required|min:6|max:32',
                        'confirm_password' => 'required|min:65535|max:32',
                        'selected_role' => 'required',
                    ],[
                        'selected_role.required' => '役割を選択する必要があります',
                        'confirm_password.min' => 'そのメールアドレスとパスワードの組み合わせはすでに利用されています。',
                        'confirm_password.max' => '確認用パスワードを32文字以上入力してください。',
                        'confirm_password.required' => 'パスワードの確認を入力してください。',
                    ]);
                }else{
                    $validator = Validator::make($request->all(), [
                        'last_name' => 'required',
                        'first_name' => 'required',
                        'email' => 'required',
                        'password' => 'required|min:6|max:32',
                        'confirm_password' => 'required|min:6|max:32',
                        'selected_role' => 'required'
                    ],[
                        'selected_role.required' => '役割を選択する必要があります',
                        'confirm_password.min' => '確認用パスワードを6文字以上入力してください。',
                        'confirm_password.max' => '確認用パスワードを32文字以上入力してください。',
                        'confirm_password.required' => 'パスワードの確認を入力してください。'
                    ]);
                }
            }
        }else{
            $validator = Validator::make($request->all(), [
                'last_name' => 'required',
                'first_name' => 'required',
                'email' => 'required',
                'password' => 'required|min:6|max:32',
                'confirm_password' => 'required|min:6|max:32',
                'selected_role' => 'required'
            ],[
                'selected_role.required' => '役割を選択する必要があります',
                'confirm_password.min' => '確認用パスワードを6文字以上入力してください。',
                'confirm_password.max' => '確認用パスワードを32文字以上入力してください。',
                'confirm_password.required' => 'パスワードの確認を入力してください。'
            ]);
        }
       

        if($validator->fails()){
            return redirect('/store/setting/user#register_account')->withErrors($validator)->withInput();
        }

        if($request->password != $request->confirm_password){
            return redirect('/store/setting/user#register_account')->with('fail', '（確認）と一致していません。')->withInput();
            // return redirect('/store/setting/user#register_account')->withErrors('（確認）と一致していません。')->withInput();
        }
            $user = new Accounts;
            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_id = 0;
            $user->group_id = $headquarter_group_id;
            $user->store_id = $request->selected_role;
            // dd($user->email);
            $user->save();

            return redirect()->back();

        // dd('clicked');

    }
}
