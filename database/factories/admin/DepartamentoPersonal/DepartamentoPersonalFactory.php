<?php

namespace Database\Factories\admin\DepartamentoPersonal;

use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartamentoPersonalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepartamentoPersonal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_integracion" => rand(1, 9999),
            "ficha" => rand(1000, 99999),
            "profesion" => $this->faker->randomElement(['programador Front End', 'Programador Back End']),
            "situacion_contractual" => Str::random(20),
            "resultados_tecnicos" => $this->faker->randomElement(['muy malo', 'regular', 'bueno', 'muy bueno']),
            "nombre" => $this->faker->name,
            "num_cedula" => rand(1500, 200000),
            "cpp" => rand(1200, 100000) . ' ' . Str::random(6),
            "validacion" => $this->faker->randomElement(['true', 'false']),
            "name_directory" => 'public/' . Str::random(20),
            "carta_no_inhabilitacion" => "departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_CartaNoInhabilitacion_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "cedula_siep" => "departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_cedulaSiep_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "validacion_siep" => "departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_validacionSiep_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "resultados_ev_tec" => "departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_resultadosEvTec_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "documento1" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento2" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento3" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento4" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            /* Documentos que se manden a Departamento Personal */
            "memorandum_documento" => "departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_cedulaSiep_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "cedula_siep_documento" => "departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_cedulaSiep_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "documento_1_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_2_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_3_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_4_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_5_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_6_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_7_adicional" => $this->faker->randomElement(["departamento_personal/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
        ];
    }
}
