<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $type;
    public $value;
    public $readonly;
    public $required;
    public $complement;
    public $accept;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = "",
        $name,
        $type = "text",
        $value = "",
        $readonly = "",
        $required = "",
        $complement = "",
        $accept = "",
        $id = ""
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->readonly = $readonly;
        $this->required = $required;
        $this->complement = $complement;
        $this->accept = $accept;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
