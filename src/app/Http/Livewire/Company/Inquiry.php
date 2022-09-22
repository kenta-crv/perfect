<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use App\Models\Inquiry as Inquiries;
class Inquiry extends Component
{

    public $inquiry_type, $name, $email, $tel_no, $others;

    public function render()
    {
        return view('livewire.company.inquiry');
    }

    public function resetFields(){
        $this->inquiry_type = '';
        $this->name = '';
        $this->email = '';
        $this->tel_no = '';
        $this->others = '';
    }

    public function save(){
       $validate = $this->validate([
            'inquiry_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'tel_no' => 'required',
            'others' => 'required',
        ]);

        $save = Inquiries::create($validate);

        if($save){
            $this->dispatchBrowserEvent('InsertedSuccessfully');
            $this->resetFields();
        }
    }
}
