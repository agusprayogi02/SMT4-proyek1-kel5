<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $value;
    public $label;
    public $initValues;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value, $label, $initValues)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->initValues = $initValues;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
