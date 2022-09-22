<?php

namespace App\View\Components\Admin\Table;

use Illuminate\View\Component;

class Row extends Component
{
    public $classType ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($classType )
    {
        $this->classType  = $classType ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.table.row');
    }
}
