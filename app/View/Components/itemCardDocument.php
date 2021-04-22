<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class itemCardDocument extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $parentID;
    public $collapseID;
    public $cardHeader;
    public $departamento;
    public $documento;
    public function __construct($parentComponent, $nameCollapse, $documento, $cardHeader = "referencia_encabezado", $departamento = "undefinido")
    {
        $this->parentID = $parentComponent;
        $this->collapseID = $nameCollapse;
        $this->cardHeader = $cardHeader;
        $this->departamento = $departamento;
        $this->documento = $documento;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.item-card-document');
    }
}
