<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WelcomeModal extends Component
{
    public $message = '';

public function mount()
{
  $this->message = 'Welcome to the reusable modal example';
}
    public function render()
    {
        return view('livewire.welcome-modal');
    }
}
