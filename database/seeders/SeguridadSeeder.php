<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Asistencia;
use App\Models\Capacitacion;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\User;

class SeguridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //departamento
        Departamento::create([
            'depnombre' => 'Abastecimiento',
        ]);
        Departamento::create([
            'depnombre' => 'Compras',
        ]);
        Departamento::create([
            'depnombre' => 'Finanzas',
        ]);
        Departamento::create([
            'depnombre' => 'Ventas',
        ]);
        Departamento::create([
            'depnombre' => 'Adminstrar',
        ]);
        Departamento::create([
            'depnombre' => 'Seguridad',
        ]);
        //-----------------------------


        //Administracion
        Empleado::create([
            'empnombres' => 'Jaime Eduardo',
            'empapellidop' => 'Centurion',
            'empapellidom' => 'Goicochea',
            'empdni' => '70683607',
            'empdireccion' => 'Dirección 99',
            'emptelefono' => '981268897',
            'idDepartamento' => 1,
        ]);
        User::create([
            'usunombre' => 'Jaime Eduardo Centurion',
            'usuemail'    => 'admin@example.com',
            'usucontra' => Hash::make('password'), // password
            'idEmpleado' => 1,
        ])->assignRole('admin');


    }
}
