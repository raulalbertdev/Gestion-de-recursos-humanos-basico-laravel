<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProcedimientoCancelar extends Component
{
    public $departamento;
    public $informacion;
    public $controls;
    public function __construct($departamento = null, $data = null, $controls = null)
    {
        $this->departamento = $departamento;
        $this->informacion = $data;
        $this->controls = $controls;
    }

    public function render()
    {
        return view('components.procedimiento-cancelar');
    }
}
