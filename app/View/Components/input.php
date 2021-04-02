<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $field;
    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field, $model = null)
    {
        $this->field = $field;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}