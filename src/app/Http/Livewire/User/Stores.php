<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Accounts as Account;
use App\Models\Stores as Store;
use Illuminate\Support\Facades\Hash;
use Session;
class Stores extends Component
{
    public $company_name, $address, $tel_no, $last_name, $first_name, $email, $password, $payment_method;

    public function render()
    {
        return view('livewire.user.stores.stores');
    }

    public function resetFields(){
        $this->company_name = '';
        $this->address = '';
        $this->tel_no = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->email = '';
        $this->password = '';
        $this->payment_method = '';
    }

    public function save(){
        $this->validate([
            'company_name' => 'required',
            'address' => 'required',
            'tel_no' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required | unique:stores',
            'password' => 'required',
            'payment_method' => 'required',
        ],
        [
            'company_name.required' => '会社名が必要です',
            'address.required' => '市区町村を入力してください。',
            'tel_no.required' => '電話番号を入力してください。',
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名の入力は必須です',
            'email.required' => 'Eメールを入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'payment_method.required' => 'お支払い方法が必要です'
        ]);
    
        $data = [
            'company_name' => $this->company_name,
            'address' => $this->address,
            'tel_no' => $this->tel_no,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password,
            'payment_method' => $this->payment_method
        ];
        return redirect()->route('register.confirmation')->with([
            'data' => $data
        ]);

   
    }
}
