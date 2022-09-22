<?php

namespace App\Http\Controllers\Store;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\MailSendingListHeadquarter;
use App\Models\ScrapingTarget;
use Illuminate\Support\Facades\Validator;


class ManagerController extends Controller
{
    public function index(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.manager.index');
        }

    }

    public function myPage(Request $request){
        $accounts = Accounts::find($request->session()->get('LoggedUser'));

        $mail_sending = MailSendingListHeadquarter::all();
        $account_id = session()->get('LoggedUser');
        $site = ScrapingTarget::where('account_id', $account_id)->get();
        if($accounts == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.manager.myPage', [
                'accounts' => $accounts,
                'mail_sending' => $mail_sending,
                'sites' => $site,
            ]);
        }




    }
    public function settings(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        $store_list = Accounts::where('store_id', 1)
        ->where('group_id', '=', session()->get('group_id'))->get();
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.manager.settings',[
                'store_list' => $store_list
            ]);
        }

    }

    public function settingsAccountUpdate(Request $request) {
       
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:6 | max:32'
        ],
        [
            'email.required' => 'Eメールを入力してください。',
            'email.email' => 'Eメールの形式が正しくありません。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは最低6文字以上で入力してください。',
            'password.max' => 'パスワードは最大32文字以内で入力してください。'
        ]);

        $user = Accounts::where([['email', $request->input('email')],['password', Hash::check('plain-text', $request->input('password'))]])->first();
        if($user->store_id == 0){
            // if (Auth::guard('account')->attempt(['email' => $request->email, 'password' =>
            // $request->password])) {
            //     $user->group_id = session()->get('group_id');
            //     $user->update();
            //     return redirect()->back();
            // }
            $user->group_id = session()->get('group_id');
            $user->update();
            return redirect('/store/manager/settings');
        } else {
            return redirect()->back();
        }
    }

    public function settingsAccountUnregister(Request $request){

        $request->validate([
            'email_unregister' => 'required | email',
            'password_unregister' => 'required'
        ],
        [
            'email_unregister.required' => 'Eメールを入力してください。',
            'email.email' => 'Eメールの形式が正しくありません。',
            'password_unregister.required' => 'パスワードを入力してください。'
        ]);

        $user = Accounts::where('email', $request->input('email_unregister'))->first();
    
        if($user->store_id == 1){
            if (Auth::guard('account')->attempt(['email' => $request->email_unregister, 'password' =>
            $request->password_unregister])) {
                $user->group_id = NULL ;
                $user->update();
                return redirect()->back();
            }
        } else {
             return redirect()->back();
        }

    }
    public function registration(){
        return view('store.manager.registration');
    }

    public function delete($id){
        $data = MailSendingListHeadquarter::find($id);
        $data->delete();
        return redirect('/store/manager/mypage');
    }

    public function edit($id){
        $mail = MailSendingListHeadquarter::where('id', $id)->first();

        return view('store.manager.update',compact('mail'));
    }

    public function update(Request $request, $id){

        $mail = MailSendingListHeadquarter::find($id);
        $mail->name = $request->input('name');
        $mail->email = $request->input('email');
        $mail->update();
        return redirect('/store/manager/mypage')->with('status','Mail Updated Successfully');
    }

    public function register(Request $request){

        $input = $request->all();
        $input['group_id'] = session()->get('group_id');
        MailSendingListHeadquarter::create($input);

        return redirect('/store/manager/mypage')->with('status','E-mail Added Successfully');

    }

    public function myPageUpdate(Request $request) {
        
        $account_id = $request->account_id;
    
        $input = $request->all();
        if(!empty($request->password)){
            $input['password'] = Hash::make($request->input('password'));
        }
        else{
            unset($input['password']);
        }
        
        $accounts = Accounts::find($account_id);
        $accounts->update($input);
        return redirect('/store/manager/mypage');
        
        // if($accounts && Hash::check($request->confirm_password, $accounts->password)){
        //     if($accounts->email !== $request->email){
        //         $request->validate([
        //             'confirm_password' => 'required'
        //         ]);
        //         $checkEmails = Accounts::where('email', $request->email)->get();
        //         foreach($checkEmails as $newEmail){
        //             if ($newEmail && Hash::check($request->confirm_password, $newEmail->password)) {
        //                 $request->validate([
        //                     'email' => 'required | unique:accounts',
        //                 ]);
        //             }
        //         }
        //     }
        // }else{
        //     return redirect()->back()->withErrors(["email"=>"パスワードが一致しません!"]);
        // }
        
        
    }

    public function updatepassword(Request $request){

    //    $validate =  $this->validate($request, [
    //         'password' => 
    //             'required|min:6|max:32',
            
    //     ]);
    //     dd($validate);
        // $input = $request->all();
       
        $account = Accounts::find($request->account_id);
        // if(Hash::check($request->current_password, $account->password)){
        //     $account->fill([
        //         $input['password'] = Hash::make($request->input('password'))
        //     ])->update($input);
        //     return redirect('store');
        // }else{
        //     return back()->with('fail', '現在のパスワードが正しくない');
        // }
        if(strlen($request->password) <= 6 || strlen($request->password) >= 32){
            return redirect('store/manager/mypage#changepassword')->with('failpass', '6文字以上、32文字以内 入力してください')->withInput();
        
        }

        if (Hash::check($request->current_password, $account->password)) { 
            $account->fill([
                'password' => Hash::make($request->password)
                ])->update();
            
            $request->session()->flash('success', 'Password changed');
            return redirect('/store');
            
            } else {
            // return back()->with('fail', '現在のパスワードが正しくない');
            return redirect('store/manager/mypage#changepassword')->with('fail', '現在のパスワードが正しくない')->withInput();
            //  return redirect('/store/manager/mypage');
            }
        
       
    }

    


}
