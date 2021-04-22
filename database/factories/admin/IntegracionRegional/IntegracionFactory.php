<?php

namespace Database\Factories\admin\IntegracionRegional;

use App\Models\admin\IntegracionRegional\Integracion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IntegracionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Integracion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "validacion" => $this->faker->randomElement(["true", "false"]),
            "name_directory" => 'public/' . Str::random(20),
            "memorandum" => "integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(20) . rand(100, 9999) . ".pdf",
            "documento_adicional_1" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_2" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_3" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_4" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_5" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_6" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
            "documento_adicional_7" => $this->faker->randomElement(["integracion_regional/" . Str::random(24) . "_Pemex_Mexico_" . "/"  . time() . "_FilePemex_" . Str::random(25) . rand(100, 9999) . ".pdf", null]),
        ];
    }
}
