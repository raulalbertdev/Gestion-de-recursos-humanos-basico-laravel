<?php

namespace App\View\Components;

use Illuminate\View\Component;

class bandejaEntradaDocumentos extends Component
{
    /* 
    Recibir Datos 

    $ id del candidato
    $ Nombre del departamento para saber que archivo descargar
    $ Indicar si es memorandum, cedula_siep 
    $texto o titulo para colocarlo al boton de la descarga de archivos
    
    $Modelo  en el cual contiene todos los registros traido de la base de datos, en excepcion con los campos de archivos adicionales
    $Modelo en el cual contiene los registros traido de la base de datos de los campos de archivos adicionales
    
    $un valor true para saber si mandaron archivos adicionales
    */
    /*     public $modeloDatos;
    public $modeloArchivosAdicionales;
    public $tipo_documento;
    public $departamento;
    public $textoBoton; */
    public $diferenciaFecha;
    public $accordionID;
    public $titleBandeja;
    public function __construct($diffFecha, $dataParentComponent, $titleBandeja = 'Bandeja de Entrada'/* $modeloDatos, $archivosAdicionales, $nombreDocumento, $departamento, $textoBtn */)
    {
        /* $this->modeloDatos = $modeloDatos;
        $this->modeloArchivosAdicionales = $archivosAdicionales;
        $this->tipo_documento = $nombreDocumento;
        $this->departamento = $departamento;
        $this->textoBoton = $textoBtn; */
        $this->diferenciaFecha = $diffFecha;
        $this->accordionID = $dataParentComponent;
        $this->titleBandeja = $titleBandeja;
    }

    public function render()
    {
        return view('components.bandeja-entrada-documentos');
    }
}
