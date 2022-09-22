<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\RequestInformation;
use Illuminate\Support\Facades\Crypt;
class Company extends Component
{
    public
        $license,
        $company_name,
        $tel,
        $prefecture,
        $last_name,
        $first_name,
        $email,
        $body,
        $status1,
        $status2,
        $status3,
        $status4;

    public function render()
    {
        return view('livewire.user.company');
    }

    public function resetFields()
    {
        $this->license = '';
        $this->company_name = '';
        $this->tel = '';
        $this->prefecture = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->email = '';
        $this->status1 = '';
        $this->status2 = '';
        $this->status3 = '';
        $this->status4 = '';
    }

    public function rules(){
        return config('validation.validate.company');
    }
    public function store(){

        $save = RequestInformation::create([
            'license' => $this->license,
            'tel' => $this->company_name,
            'prefecture' => $this->prefecture,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'body' => $this->body,
            'status1' => $this->status1,
            'status2' => $this->status2,
            'status3' => $this->status3,
            'status4' => $this->status4,
        
            
            
        ]);

        if($save){
            $this->dispatchBrowserEvent('InsertedSuccessfully');
            $this->resetFields();
            $save->sendEmailVerificationNotification();
        }

        // $validate_input = $this->validate($this->rules());
        // $store = Companys::create($validate_input);
        // if($store){
        //     $this->dispatchBrowserEvent('InsertedSuccessfully');
        //     $this->resetFields();
        //     $store->sendEmailVerificationNotification();
        // }

    }


}
