<?php

namespace App\View\Components\Store;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Button extends Component
{
    public $active;
    public $customClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active, $customClass)
    {
        $this->active = $active;
        $this->customClass = $customClass;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.store.button');
    }
}
