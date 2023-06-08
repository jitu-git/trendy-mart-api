<?php

namespace App\View\Components;

use App\Extra\Forms\src\FormInterface;
use Illuminate\View\Component;
use Illuminate\View\View;

class Form extends Component
{

    public $form;

    public $class;

    public $title;

    /**
     * Create a new component instance.
     *
     * @param $class
     * @return void
     */
    public function __construct(FormInterface $class)
    {
        $this->form = $class->form();

        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
