<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class VerticalInput extends Component
{
    public $type;
    public $name;
    public $value;
    public $label;
    public $placeholder;
    public $options; // Untuk select atau radio button
    public $required;
    public $readonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $type = 'text',
        $name = '',
        $value = '',
        $label = '',
        $placeholder = '',
        $options = [],
        $required = false,
        $readonly = false
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->label = ucfirst($label);
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->required = $required;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.vertical-input');
    }
}
