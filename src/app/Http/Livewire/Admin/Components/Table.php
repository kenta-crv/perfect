<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class Table extends Component
{
    public $thead, $tbody_data;

    public function render()
    {
        return view('livewire.admin.components.table');
    }

    public function mounted($data){
        $this->tbody_data = $data;
    }
}
