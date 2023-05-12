<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Radio extends Component
{
    public $name;
    public $value;
    public $label;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value, $label, $id)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.radio');
    }
}
