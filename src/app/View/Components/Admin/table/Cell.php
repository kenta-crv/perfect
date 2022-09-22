<?php

namespace App\View\Components\Admin\Table;

use Illuminate\View\Component;

class Cell extends Component
{
    public $thead;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($thead)
    {
        //
        $this->thead = $thead;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.table.cell');
    }
}
