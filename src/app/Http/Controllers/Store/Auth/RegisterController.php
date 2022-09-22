<?php

namespace App\Http\Controllers\Store\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Traits\GetPasswordTrait;
use App\Models\RequestInformation;
use App\Traits\DownloadFileTrait;

class RegisterController extends Controller
{

    use GetPasswordTrait;
    use DownloadFileTrait;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectToComplete = '/register/complete';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function RequestInformationrules(){

    }

    public function registerBroker(){
        return view('store.auth.broker');
    }

    public function registerStore(){
        return view('store.auth.store.store');
    }

    public function confirm(RegisterRequest $request)
    {
        $data = $request->except('password_confirmation');
        session(['data' => $data]);
        return view('store.auth.confirm', [
            'data' => $data,
        ]);
    }

    public function register()
    {
        $data = session('data');
        event(new Registered($user = $this->create($data)));
         // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminRegisterMail($user));

        return $this->registered()
            ?: redirect($this->redirectPath());
    }

    public function registered()
    {
        return redirect($this->redirectToComplete)->with('success', 'ご登録のメールアドレスへ確認のメールが送信されました');
    }


    public function complete()
    {
        return view('store.auth.complete');
    }

    public function emailSent()
    {
        return view('store.auth.email_sent');
    }

    public function resendVerifyEmail(Request $request)
    {
        $id = session('verify_id');
        $user = User::where('id', $id)->first();
        $user->sendEmailVerificationNotification();

        return redirect()->route('store.register.emailSent');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rulus = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $message = [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は最大255文字までです',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式が正しくありません',
            'email.unique' => 'このメールアドレスはすでに利用されています',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上',
        ];

        return Validator::make($data, $rules, $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['photo_src'];
        return User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'last_name_kana' => $data['last_name_kana'],
            'first_name_kana' => $data['first_name_kana'],
            'nickname' => $data['nickname'],
            'photo_path' => $data['photo_path'],
            'birth_date' => $data['birthday'],
            'gender' => $data['gender'],
            'zip_code' => $data['zipcode'],
            'prefecture' => $data['prefecture'],
            'address' => $data['address'],
            'small_address' => $data['small_address'],
            'tel' => $data['tel'],
            'tel2' => $data['tel2'],
            'tel3' => $data['tel3'],
            'email' => $data['email'],
            'pachislot_flag' => $data['pachislot_flag'],
            'password' => $this->storePassword($data['password']),
            'email_magazine_flag' => $data['email_magazine_flag'],
        ]);
    }


    public function registerCompany(){
        return view('robore.requestInformation.create');
    }

    public function rules($input, $data){
        $validate = $data;
        return $input->validate($validate);
    }

    public function confirmRequestInformation(Request $request){

        if($request->all() == null){
            return redirect()->to('requestinformation/');
        }
        else{
            $data  = config('validation.validate.request_informations');
            $rules = $this->rules($request, $data);

            $status_array = $request->status;

            if($rules){
                return view('robore.requestInformation.confirm',[
                    'status_array' => $status_array,
                    'inputRequest' => $request->all()
                ]);
            }
            return $rules;
        }

    }

    public function saveRequestInformation(Request $request){

        $input = $request->all();
        $status = $request->status;

        if($status){
            foreach($status as $stat){
                $input['status'.$stat] = $stat;
            }
        }

        $save = RequestInformation::create($input);
        $save->sendRequestInformationEmailNotification();

        // $file_name = 'information.pdf';
        // $download = $this->downloadFile($file_name);

        // return $download;
        return view('robore.requestInformation.thanks');
    }


}
