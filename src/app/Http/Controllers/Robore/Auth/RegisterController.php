<?php

namespace App\Http\Controllers\Robore\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stores;
use Illuminate\Support\Facades\Hash;
use App\Models\MtLicenses;
use App\Models\Accounts;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mpdf\Tag\P;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('store.auth.register.broker');
    }

    public function registerCredit(){
        return view('store.auth.register.registerCredit');
    }
    public function registerDebit(Request $request){
        $latest = DB::table('accounts')->latest()->first();
        $value = $request->session()->get('contract_number');
        return view('store.auth.register.registerDebit',[
            'contract_number' => $latest,
            'value' => $value
        ]);
    }
    public function registerHeadquarterConfirm(Request $request)
    {
        return view('store.auth.store.confirm');
    }

    public function Registerconfirm(Request $request)
    {
        return view('livewire.user.broker.confirm',[
            'request' => $request,
        ]);
    }

    public function registerHeadquarterSuccess()
    {
        return view('store.auth.store.success');
    }

    public function registerSuccess()
    {
        return view('store.auth.register.success');
    }

    public function confirm(Request $request){
        $store = new Accounts;

        // $store->company_name = $request->company_name;
        // $store->address = $request->address;
        // $store->tel = $request->tel_no;
        // // $store->person_in_charge = $request->last_name . $request->first_name;
        // $store->last_name = $request->last_name;
        // $store->first_name = $request->first_name;
        // $store->email = $request->email;
        // $store->password = Hash::make($request->password);
        // $store->payment_method = $request->payment_method;
        // $store->store_id = 0;
        // $latestnum = Accounts::all()->last()->id ?? 0;
        // $store->group_id = $latestnum + 1;
        // $store->save();
        // $store->sendEmailVerificationNotification();
        $input = $request->all();

        // $input['group_id'] = Accounts::all()->last()->id ?? 0;
        $latestnum = Accounts::where('store_id', 1)->get()->last()->group_id ?? 0;
        $input['group_id'] = $latestnum;
        $input['store_id'] = 1;
        $input['headquarter_flag'] = 1;
        $input['password'] = Hash::make($request->password);
        // dd($input);
        $save = Accounts::Create($input);
        if(route('register.head.success')){
            $mailData = [
                'lastname' => $input['last_name'],
                'firstname' => $input['first_name'],
                'company' => $input['company_name'],
            ];
            Mail::to($input['email'])->send(new SendMail($mailData));
            return redirect()->route('register.head.success');
        }
        // $mailData = [
        //     'lastname' => $input['last_name'],
        //     'firstname' => $input['first_name'],
        //     'company' => $input['company_name'],
        // ];
        // Mail::to($input['email'])->send(new SendMail($mailData));
        // // $save->sendEmailVerificationNotification();

        // return redirect()->to('register/registerHeadquarter/success');
    }


    public function confirmationRegister(Request $request){
        // return response()->json($request->all());

        $broker = new Accounts;
        $broker->license = $request->license_number;
        $broker->company_name = $request->company_name;
        $broker->address = $request->address;
        $broker->tel = $request->contract_number;
        // $broker->person_in_charge = $request->last_name . $request->first_name;
        $broker->last_name = $request->last_name;
        $broker->first_name = $request->first_name;
        $broker->payment_method = $request->payment_method;
        $broker->plans = $request->usage_plan;
        $broker->email = $request->email;
        $broker->contract_number = substr(str_shuffle("0123456789101112131415"), 0, 15);
        $broker->password = Hash::make($request->password);
        $broker->store_id = 1;
        // temporary group_id is logged in user group_id if no auth, group_id = 0
        $headquarter_group_id = $request->session()->has('LoggedStoreUser') ? Accounts::find($request->session()->get('LoggedStoreUser'))->group_id : 1;
        $broker->group_id = (int)Accounts::orderBy('group_id', 'desc')->first()->group_id+1;
        $broker->user_id = 0;
        $request->session()->put('contract_number', $broker->contract_number);
        $request->session()->put('company_name', $broker->company_name);
        $request->session()->put('first_name', $broker->first_name);
        $request->session()->put('last_name', $broker->last_name);
        $request->session()->put('email', $broker->email);
        $broker->save();

        if($request->payment_method == 3){
            if(route('register.register.success')){
                $mailData = [
                    'lastname' => $broker->last_name,
                    'firstname' => $broker->first_name,
                    'company' => $broker->company_name,
                ];
                Mail::to($broker->email)->send(new SendMail($mailData));
            }
        }
        
        // $broker->sendEmailVerificationNotification();

        if($request->payment_method == 2){
            return redirect()->to('/register/registerCredit');
        }
        elseif($request->payment_method == 1){
            return redirect()->to('/register/registerDebit');
        }
        else {
            return redirect()->to('register/success');
        }

    }

    public function debitSuccessRegister(Request $request){
        $first_name = session()->get('first_name');
        $last_name = session()->get('last_name');
        $company_name = session()->get('company_name');
        $email = session()->get('email');
        if(route('register.register.success')){
            $mailData = [
                'lastname' => $last_name,
                'firstname' => $first_name,
                'company' => $company_name,
            ];
            Mail::to($email)->send(new SendMail($mailData));
            return redirect()->route('register.register.success');
        }
        // echo "clicked";
    }


    public function thanks(Request $request)
    {
        return view('livewire.user.broker.thanks',[
            'request' => $request,
        ]);
    }

    /**headquarter confirmation**/
    public function confirmRegisterHeadquarter(Request $request){
    
        // if(strlen($request->password) <= 6 || strlen($request->password) >= 32){
        //     return back()->with('failpass', '6文字以上、32文字以内 入力してください');
        // }
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required | unique:accounts',
            'payment_method' => 'required',
            'password' => 'min:6 | max:32'
        ]);
        
        if($request->all()==null)
        {
            return redirect()->to('register/registerHeadquarter');
        }
      
        $status = 'headquarter';
        $rules = $this->accountValidator($request, $status);
        if($rules){
            return view('store.auth.store.confirm',[
                'headquarter' => $request->all()
            ]);
        }
        return $rules;
        // return view('store.auth.store.confirm', ['headquarter' => $request->all()]);
    }

    public function accountValidator(Request $request, $status){
        
        $accounts = Accounts::where('email', $request->email)->get();
        if(count($accounts) != 0){
            foreach($accounts as $account){
                if ($account && Hash::check($request->password, $account->password)) {
                    $data = [
                        'license_number' => 'required',
                        'company_name' => 'required',
                        'address' => 'required',
                        'contract_number' => 'required',
                        'last_name' => 'required',
                        'first_name' => 'required',
                        'email' => 'required | unique:accounts',
                        'password' => 'required | min:6 | max:32',
                        'usage_plan' => 'required',
                        'payment_method' => 'required',
                    ];
                }else{
                    if($status == 'headquarter'){
                        $data  = config('validation.validate.headquarter');
                    }else{
                        $data  = config('validation.validate.register_company');
                    }
                }
            }
        }else{
            if($status == 'headquarter'){
                $data  = config('validation.validate.headquarter');
            }else{
                $data  = config('validation.validate.register_company');
            }
        }
       
        $rules = $this->rules($request, $data, $status, $request);
        return $rules;
    }
    
    public function confirmRegister(Request $request){
        // dd($request->all());
        // if(strlen($request->password) <= 6 || strlen($request->password) >= 32){
        //     return back()->with('failpass', '6文字以上、32文字以内 入力してください');
        // }

        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'contract_number' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required | unique:accounts',
            'usage_plan' => 'required',
            'payment_method' => 'required',
            'password' => 'required | min:6 | max:32'
            
        ]);

        if($request->all()==null)
        {
            return redirect()->to('register/');
        }
        $rules = $this->accountValidator($request, 'register');

        if($rules){
            return view('store.auth.register.confirm',[
                'register' => $request->all()
            ]);
        }
        
        return $rules;
    }
    
    public function rules($input, $data, $status, $request){
        $validate = $data;
        
        if($status == 'register'){
            if($request->license_slct != null && $request->license_number_2 != null){
                $mtLicenses = MtLicenses::where('license', 'like' , "%{$request->license_slct}%")->where('license', 'like', "%{$request->license_number_2}%")->get();
               
                // dd(count($mtLicenses));
                if(count($mtLicenses) == 0){
                    $validate['license_slct'] = 'required | max:2';
                    return $input->validate($validate, 
                        [
                            'license_slct.max' => '入力された宅建業者番号は存在しません。',
                        ]
                    );
                }
            }
            return $input->validate($validate, 
                [
                    'license_slct.required' => '選択してください,入力してください。',
                    'license_number_2.required' => '6桁の半角数字入力してください。',
                ]
            );
        }else{
            $validate = $data;
        
            if(isset($data['license_number'])){
                return $input->validate($validate, 
                    [
                        'license_number.required' => '宅建業免許番号を入力してください。',
                    ]
                );
            }
            return $input->validate($validate);
        }
    }

    public function registerHeadquarter()
    {
        return view('robore.register.headquarter.create');
    }

    public function registerSales()
    {
        return view('robore.register.headquarter.create');
    }

}
