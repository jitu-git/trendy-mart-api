<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class FormContainer extends Component
{
    public $title;

    public $cancel;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $cancel
     * @return void
     */
    public function __construct(string $title, string $cancel)
    {
        $this->title = $title;
        $this->cancel = $cancel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.form-container');
    }
}
