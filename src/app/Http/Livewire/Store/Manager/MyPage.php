<?php

namespace App\Http\Livewire\Store\Manager;

use Livewire\Component;
use App\Models\Accounts;
class MyPage extends Component
{
    public  $is_edit = false;


    public function render()
    {
        $accounts = Accounts::find(1);
        return view('livewire.store.manager.my-page',[
            'accounts' => $accounts,
        ]);
    }

    
}
