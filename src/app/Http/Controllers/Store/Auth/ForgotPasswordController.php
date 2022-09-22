<?php

namespace App\Http\Controllers\Store\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:user');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function broker()
    {
        return Password::broker('users');
    }

    public function showLinkRequestForm()
    {
        return view('web.password.forget');
    }

    public function sendResetLinkEmail(Request $request)
    {
        //$this->validateEmail($request);
        // $validator = $this->validate($request, [
        //     'email'    => 'required | email',
        // ],
        // [
        //     'email.required'    => 'メールアドレスの入力は必須です',
        // ]);

        // $validator->getTranslator()->setLocale('ja');


            
        $rules = [
            'email' => 'required|email',
        ];
    
        $customMessages = [
            'required' => 'メールアドレスの入力は必須です.',
        ];

        $validator = \Validator::make($request->all(), [
            'email' => 'required | email',
        ]);
        
        $validator->getTranslator()->setLocale('ja');
        $this->validate($request, $rules, $customMessages);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    public function complete()
    {
        return view('store.password.complete');
    }


    public function sendResetLinkResponse(Request $request)
    {
        return redirect()->route('store.password.complete');
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
}
