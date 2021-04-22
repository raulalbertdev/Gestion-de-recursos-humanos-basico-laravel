<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Integracion::factory(100)->create();
        DesarrolloHumano::factory(100)->create();
        DepartamentoPersonal::factory(100)->create();
    }
}
