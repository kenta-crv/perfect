<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Event;

class BattleQuizForm extends Component
{

    public $events;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->events = Event::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.battle-quiz-form');
    }
}
