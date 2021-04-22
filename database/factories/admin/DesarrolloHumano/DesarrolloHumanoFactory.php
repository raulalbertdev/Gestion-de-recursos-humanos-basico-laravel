<?php

namespace Database\Factories\admin\DesarrolloHumano;

use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DesarrolloHumanoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DesarrolloHumano::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_integracion" => rand(1, 9999),
            "posicion" => rand(1, 500) . rand(1, 500) . rand(1, 500) . rand(1, 500),
            "subdireccion" => $this->faker->randomElement(['SUBDIRECCIÓN DE PROCESO DE GAS Y PETROQUÍMICOS', 'SUBDIRECCIÓN DE SERVICIOS DE SALUD', 'SUBDIRECCIÓN DE CAPITAL HUMANO', 'AUDITORÍA INTERNA', 'SUBDIRECCIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN']),
            "grupo" => rand(2, 3),
            "motivo_vacante" => $this->faker->randomElement(['', '']),
            "vigencia" => now(),
            "plaza" => strtoupper(Str::random(9)) . ' ' . rand(0, 99999),
            "gerencia" => $this->faker->randomElement(['SUBGERENCIA DE PLANEACIÓN Y PROGRAMACIÓN DE OPERACIONES DE GAS Y PETROQUÍMICOS', 'SUBDIRECCIÓN DE PROCESO DE GAS Y PETROQUÍMICOS', 'HOSPITAL GENERAL COMALCALCO, TAB.', 'HOSPITAL REGIONAL VILLAHERMOSA, TAB.', 'E.T. REP. GERENCIA DE FINANZAS EN LAS EMPRESAS PRODUCTIVAS SUBSIDIARIAS EN VILAHERMOSA']),
            "juridiccion_plaza" => Str::random(30),
            "validacion" => $this->faker->randomElement(["true", "false"]),
            "name_directory" => 'public/' . Str::random(20),
            "memorandum" => "desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "cedula_siep" => "desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "documento_adicional_1" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_2" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_3" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_4" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_5" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_6" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_7" => $this->faker->randomElement(["desarrollo_humano/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
        ];
    }
}
