<?php

namespace App\View\Components;

use Illuminate\View\Component;

class option extends Component
{
    public $label;
    public $value;
    public $condition;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $value = null, $condition = false)
    {
        $this->label = $label;
        $this->value = $value;
        $this->condition = $condition;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.option');
    }
}