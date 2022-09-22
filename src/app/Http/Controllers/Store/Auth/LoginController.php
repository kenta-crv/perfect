<?php

namespace App\Http\Controllers\Store\Auth;

use App\Models\User;
use App\Models\Accounts;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AccountState;
use Carbon\Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function showLoginForm()
    {
        // ログアウトさせる
        Auth::guard('user')->logout();

        return view('store.auth.login');
    }
    //store login
    public function showStoreLoginForm()
    {
        // ログアウトさせる
        Auth::guard('user')->logout();

        return view('store.login.login');
    }

    protected function authenticated(Request $request, $user)
    {
        auth()->logoutOtherDevices($request->input('password'));
    }

    public function signIn(Request $request)
    {
        // dd($request->email);
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Eメールを入力してください。',
            'email.email' => 'Eメールの形式が正しくありません。',
            'password.required' => 'パスワードを入力してください。'
        ]);
        $user = Accounts::where('email', '=', $request->email)->first();

        // if user is dormant, redirect restarting screen.
        $state = AccountState::where('account_id', '=', $user->id)->orderBy('created_at', 'DESC')->first();
        if (Auth::guard('account')->attempt(['email' => $request->email, 'password' =>
            $request->password])) {
            if($state && $state->state == 1){
                $request->session()->put('LoggedUser', $user->id);
                $request->session()->put('group_id', $user->group_id);
                $request->session()->put('LoggedFirstName', $user->first_name);
                $request->session()->put('LoggedLastName', $user->last_name);
                $request->session()->put('CompanyName', $user->company_name);
                $request->session()->put('ContractNumber', $user->contract_number);
                $request->session()->put('StoreId', $user->store_id);
                $request->session()->put('plan', $user->plans);
                return redirect('/store/setting/restarting');
            }
        }

        if($user){
            $request->session()->put('LoggedStoreUser', $user->id);
            if (Auth::guard('account')->attempt(['email' => $request->email, 'password' =>
            $request->password])) {

            $request->session()->put('LoggedUser', $user->id);
            $request->session()->put('group_id', $user->group_id);
            $request->session()->put('LoggedFirstName', $user->first_name);
            $request->session()->put('LoggedLastName', $user->last_name);
            $request->session()->put('CompanyName', $user->company_name);
            $request->session()->put('ContractNumber', $user->contract_number);
            $request->session()->put('StoreId', $user->store_id);
            $request->session()->put('plan', $user->plans);

            $news_redirect = session('loginRedirect');
            if($news_redirect != null){
                return redirect($news_redirect);
            }
            return redirect('/store');
        }else {
            return back()->with('fail', 'メールアドレスまたはパスワードが違います。');
        }
        }
        else{
            return back()->with('fail', 'メールアドレスまたはパスワードが違います。');
        }


    }

    // Logout後の遷移先
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/store/login');
    }

    protected function loggedOut(Request $request)
    {
        return redirect(route('store.login'));
    }

    public function showResetForm(){
        return view('store.auth.reset');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email' => 'required|email|exists:accounts,email'
        ]);

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $action_link = route('storeAdmin.reset.password.form',[
            'token' => $token,
            'email' => $request->email
        ]);

        // $body = "ロボレのパスワードを再設定しました。
        // 次のパスワードにてログインしてください。

        // なお、このパスワードのままご利用いただいても構いませんし
        // 変更したい場合は、マイページから変更ください。

        // 今後とも、ロボレをよろしくお願いいたします。";

        \Mail::send('store.auth.email-forgot',[
            'action_link' => $action_link
            // 'body' => $body
        ], function($message) use ($request){
            $message->from('admin@robore.co.jp', 'admin@robore.co.jp');
            $message->to($request->email)
                    ->subject('[ロボレ]パスワードを再設定しました');
        });

        return back()->with('success', 'パスワードリセットリンクをメールで送信しました');
    }

    public function showForgotForm(Request $request, $token = null){
        return view('store.auth.forgot')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request){


        $request->validate([
            'email' => 'required|email|exists:accounts,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required'
        ]);

        if($request->password !== $request->confirm_password){
            return back()->withInput()->with('fail', 'パスワードが一致しない');
        }

        $check_token = \DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid Token');
        }else{
            Accounts::where('email', $request->email)->update([
                'password' => \Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            // return view('store.login.login')->with('success', 'パスワードのリセットに成功しました');
            return redirect()->route('storeAdmin.index')->with('success', 'パスワードのリセットに成功しました');
        }
    }

}
