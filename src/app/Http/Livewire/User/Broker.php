<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Accounts;
use App\Models\Broker as Brokers;
use Illuminate\Support\Facades\Crypt;
use Session;
class Broker extends Component
{

    public $license_number,$company_name,$address,$tel_no,$last_name,$first_name,$email,$password,$usage_plan,$payment_method;

    public function render()
    {
        return view('livewire.user.broker');
    }

    public function resetFields(){
        $this->license_number = '';
        $this->company_name = '';
        $this->address = '';
        $this->tel_no = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->email = '';
        $this->usage_plan = '';
        $this->payment_method = '';
        $this->password = '';
    }

    public function confirm()
    {
        return view('livewire.user.broker.confirm');
    }

    public function save(){
        $this->validate([
            'license_number' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'tel_no' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required | unique:company',
            'password' => 'required | min:6 | max:32',
            'payment_method' => 'required',
        ],
        [
            'license_number.required' => 'ライセンス番号が必要です',
            'company_name.required' => '会社名が必要です',
            'address.required' => '電話番号を入力してください。',
            'tel_no.required' => '市区町村を入力してください。',
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名の入力は必須です',
            'email.required' => 'Eメールを入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは最低6文字以上入力してください。',
            'password.max' => 'パスワードは最大32文字以内で入力してください。',
            'payment_method.required' => 'お支払い方法が必要です'
        ]);

        // $save = Brokers::insert([
        //     'license_number' => $this->license_number,
        //     'company_name' => $this->company_name,
        //     'address' => $this->address,
        //     'contact_no' => $this->tel_no,
        //     'person_in_charge' => $this->last_name . $this->first_name,
        //     'usage_plan' => $this->usage_plan,
        //     'payment_method' => $this->payment_method,
        //     'email' => $this->email,
        //     'password' => Crypt::encryptString($this->password)

        // ]);

        $data =[
            'license_number' => $this->license_number,
            'company_name' => $this->company_name,
            'address' => $this->address,
            'contract_number' => $this->tel_no,
            'last_name' => $this->last_name,
            'first_name' =>$this->first_name,
            'usage_plan' => $this->usage_plan,
            'payment_method' => $this->payment_method,
            'email' => $this->email,
            'password' => $this->password,
        ];

        // if($save){
        //     $this->dispatchBrowserEvent('InsertedSuccessfully');
        //     $this->resetFields();
        // }

        return redirect()->to('/register/Registerconfirm')->with(['data' => $data]);
    }
}
