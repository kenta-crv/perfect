<?php

namespace App\Http\Livewire\Admin\Account;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\Admin;

class Index extends Component
{
    public $update_modal = false;
    public $create_modal = false;
    public $delete_modal = false;

    public function render()
    {
        $accounts = Admin::all();
        return view('livewire.admin.account.index', [
            'accounts' => $accounts,
        ]);
    }

    public function add(){
        $this->create_modal = true;
    }

    public function edit(){
        $this->update_modal = true;
    }

    public function delete(){
        $this->delete_modal = true;
    }

    public function close(){
        $this->create_modal = false;
        $this->delete_modal = false;
        $this->update_modal = false;
    }
}
