<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Fields extends Component
{

    public $field;

    public $class;

    /**
     * Create a new component instance.
     *
     * @param array $field
     * @param $class
     * @return void
     */
    public function __construct(array $field, $class)
    {
        $this->field = $field;

        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.fields');
    }
}
