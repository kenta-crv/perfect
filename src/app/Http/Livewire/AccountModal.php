<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;

class AccountModal extends Modal
{
    public function render()
    {
        return view('livewire.account-modal');
    }


}
