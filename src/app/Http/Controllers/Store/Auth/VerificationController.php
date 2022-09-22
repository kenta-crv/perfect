<?php

namespace App\Http\Controllers\Attendance\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        if (!is_null($request->user('user'))) {
            return $request->user('user')->hasVerifiedEmail()
                    ? redirect($this->redirectPath())
                    : view('store.auth.verify');
        }else{
            return redirect()->route('store.login');
        }
    }


    public function verify(Request $request)
    {

        $user = User::find($request->route('id'));

        auth()->login($user);

        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($request->user('user')));
        }

        \Auth::guard('user')->login($user);
        return redirect($this->redirectPath())->with('verified', true);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function redirectPath()
    {
        return route('store.home');
    }

}
