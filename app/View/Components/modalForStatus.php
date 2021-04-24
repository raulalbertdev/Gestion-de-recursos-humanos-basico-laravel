<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalForStatus extends Component
{
    public $idDataForDepartament;
    public $ruta;
    public $departamento;
    public function __construct($idDataDepartament, $routeRedirect, $departamento)
    {
        $this->idDataForDepartament = $idDataDepartament;
        $this->ruta = $routeRedirect;
        $this->departamento = $departamento;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-for-status');
    }
}
