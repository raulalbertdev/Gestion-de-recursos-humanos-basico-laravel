<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Contratados;
use Maatwebsite\Excel\Concerns\Exportable;

class UserExport implements FromView
{
    use Exportable;
    private $id;
    public function __construct($identificador)
    {
        $this->id = $identificador;
    }
    public function view(): View
    {
        return view('pages.etapa3.generar_reporte_individual', [
            'candidato_contratado' => Contratados::findOrFail($this->id),
        ]);
    }
}
