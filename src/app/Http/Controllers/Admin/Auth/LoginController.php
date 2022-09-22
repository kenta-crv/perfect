<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ログイン画面
    public function showLoginForm()
    {
        return view('admin.auth.login'); //管理者ログインページのテンプレート
    }

    protected function guard()
    {
        return Auth::guard('account'); //管理者認証のguardを指定
    }

    //
    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Eメールを入力してください。',
            'email.email' => 'メールアドレスの形式で入力されていません',
            'password.required' => 'パスワードを入力してください。'
        ]);

        $user = Admin::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('LoggedUser', $user->id);
                $request->session()->put('LoggedLastname', $user->last_name);
                $request->session()->put('LoggedFirstname', $user->first_name);
                // return redirect()->intended(route('admin.home'));
                return redirect()->route('admin.index');
            }else{
                return back()->with('fail', 'メールアドレスまたはパスワードが違います。');
            }
        }else{
            return back()->with('fail', 'メールアドレスまたはパスワードが違います。');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin/login/')->with('flash_message', 'ログアウトしました。');
    }

}
