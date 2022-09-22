<?php

namespace App\Http\Controllers\Robore\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
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

    protected function authenticated(Request $request, $user)
    {
        auth()->logoutOtherDevices($request->input('password'));
    }

    public function login(Request $request)
    {
       echo "login";
    }

    // Logout後の遷移先
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        return redirect(route('store.login'));
    }
}
