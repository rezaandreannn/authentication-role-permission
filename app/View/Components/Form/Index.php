<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Index extends Component
{
    public $action; // URL untuk form
    public $method; // Method form (GET, POST, PUT, DELETE)
    public $enctype; // Untuk file upload

    public function __construct($action = '#', $method = 'POST', $enctype = null)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->enctype = $enctype;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.index');
    }
}
