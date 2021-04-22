<?php

namespace App\View\Components;

use Illuminate\View\Component;

class searchComponent extends Component
{
    public $modelo;
    public $routeShow;
    public $campos;
    public function __construct($modelo, $routeRedirect, $campos)
    {
        $this->modelo = $modelo;
        $this->routeShow = $routeRedirect;
        $this->campos = $campos;
    }

    public function render()
    {
        return view('components.search-component');
    }
}
