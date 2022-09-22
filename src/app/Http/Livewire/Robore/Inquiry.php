<?php

namespace App\Http\Livewire\Robore;

use Livewire\Component;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\Session\Session;
class Inquiry extends Component
{
    public $license,
           $company_name,
           $tel,
           $prefecture,
           $selectedPrefecture,
           $last_name,
           $first_name,
           $email,
           $isconfirm,
           $body;

    protected $listeners = ['confirm'];

    public function render()
    {
        return view('livewire.robore.inquiry');
    }

    public function rules(){
        return $this->validate(config('validation.validate.contacts'));
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
        $this->body = '';
    }

    public function confirm(){

        $this->dispatchBrowserEvent('thanksModal');
        $save = Contact::create($this->rules());
        $this->resetFields();
    }

    public function store(){

        $this->rules();

        if($this->rules()){
            $this->dispatchBrowserEvent('confirm');

        }


    }

}
