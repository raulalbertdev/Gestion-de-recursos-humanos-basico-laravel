<?php

namespace App\View\Components;

use Illuminate\View\Component;

class informacionContratado extends Component
{
    public $controls;
    public function __construct($controls)
    {
        $this->controls = $controls;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.informacion-contratado');
    }
}
