<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedore;
class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Proveedore::create([
            'provdoc' => '789587412568',
            'provtelefono' => '987654321',
            'provcorreo' => 'correo1@example.com',
            'provdireccion' => 'Dirección 1',
            'provrazonsocial' => 'Razón Social 1',
        ]);
        Proveedore::create([
            'provdoc' => '951235745896',
            'provtelefono' => '987654321',
            'provcorreo' => 'correo2@example.com',
            'provdireccion' => 'Dirección 2',
            'provrazonsocial' => 'Razón Social 2',
        ]);
    }
}
