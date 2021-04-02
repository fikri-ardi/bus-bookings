<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectGroup extends Component
{
    public $field;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field, $label)
    {
        $this->field = $field;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select-group');
    }
}