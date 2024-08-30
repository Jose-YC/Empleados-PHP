<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Unidadmedida;
use App\Models\TipoProducto;

class AbastecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoProducto::create(['tpronombre' => 'Combustible']);
        TipoProducto::create(['tpronombre' => 'Repuestos']);
        TipoProducto::create(['tpronombre' => 'Acesorios']);
        TipoProducto::create(['tpronombre' => 'Lubricantes']);

        Unidadmedida::create(['umednombre' => 'Galón']);
        Unidadmedida::create(['umednombre' => 'Litro']);
        Unidadmedida::create(['umednombre' => 'Unidad']);
        Unidadmedida::create(['umednombre' => 'Caja']);
        Producto::create([
            'pronombre' => 'Gasolina 95',
            'prodescripcion' => 'Gasolina para gente pudiente',
            'propreciounitario' => 20.80,
            'prostock' => 99,
            'prostockminimo' => 100,
            'propreciocompra' => 50.5,
            'idTipoproducto' => 1,
            'idUnidadmedida' => 1,
        ]);
        Producto::create([
            'pronombre' => 'Gasolina 90',
            'prodescripcion' => 'Gasolina para motos y autos',
            'propreciounitario' => 19.80,
            'prostock' => 1000000,
            'prostockminimo' => 100,
            'propreciocompra' => 50.5,
            'idTipoproducto' => 1,
            'idUnidadmedida' => 1,

        ]);
        Producto::create([
            'pronombre' => 'Gasolina 84',
            'prodescripcion' => 'Gasolina para pobres',
            'propreciounitario' => 17.80,
            'prostock' => 1000000,
            'prostockminimo' => 100,
            'propreciocompra' => 50.5,
            'idTipoproducto' => 1,
            'idUnidadmedida' => 1,
        ]);
        // Producto::create([
        //     'pronombre' => 'Espejos para carros',
        //     'prodescripcion' => 'Espejos para carros',
        //     'prostock' => 50,
        //     'prostockminimo' => 2,
        //     'propreciocompra' => 50.5,
        //     'idTipoproducto' => 4,
        //     'idUnidadmedida' => 3,
        // ]);
        // Producto::create([
        //     'pronombre' => 'Espejos para motos kirin',
        //     'prodescripcion' => 'Espejos para motos',
        //     'prostock' => 50,
        //     'prostockminimo' => 2,
        //     'propreciocompra' => 50.5,
        //     'idTipoproducto' => 4,
        //     'idUnidadmedida' => 3,
        // ]);
        // Producto::create([
        //     'pronombre' => 'Llantas para carro Michelin',
        //     'prodescripcion' => 'Llantas para carros',
        //     'propreciounitario' => 70.00,
        //     'prostock' => 100,
        //     'prostockminimo' => 4,
        //     'propreciocompra' => 50.5,
        //     'idTipoproducto' => 4,
        //     'idUnidadmedida' => 3,
        // ]);
        // Producto::create([
        //     'pronombre' => 'Llantas para motos kirin',
        //     'prodescripcion' => 'Llantas para motos',
        //     'propreciounitario' => 120.00,
        //     'prostock' => 100,
        //     'prostockminimo' => 4,
        //     'propreciocompra' => 50.5,
        //     'idTipoproducto' => 4,
        //     'idUnidadmedida' => 3,

        // ]);
        // Producto::create([
        //     'pronombre' => 'Aceite 10w40',
        //     'prodescripcion' => 'Aceite para motor',
        //     'propreciounitario' => 25.00,
        //     'prostock' => 50,
        //     'prostockminimo' => 2,
        //     'propreciocompra' => 50.5,
        //     'idTipoproducto' => 3,
        //     'idUnidadmedida' => 2,
        // ]);
        // Producto::create([
        //     'pronombre' => 'Aceite 10w30',
        //     'prodescripcion' => 'Aceite para motor',
        //     'propreciounitario' => 20.00,
        //     'prostock' => 50,
        //     'prostockminimo' => 2,
        //     'propreciocompra' => 50.5,
        //     'idTipoproducto' => 3,
        //     'idUnidadmedida' => 2,
        // ]);

        Producto::create([
            'pronombre' => 'Aceite 20w50',
            'prodescripcion' => 'Aceite para motor',
            'propreciounitario' => 30.00,
            'prostock' => 50,
            'prostockminimo' => 2,
            'propreciocompra' => 50.5,
            'idTipoproducto' => 4,
            'idUnidadmedida' => 2,
        ]);

        Producto::create([
            'pronombre' => 'Mangeras de combustible',
            'prodescripcion' => 'Mangera donde pasa el combustible',
            'prostock' => 30,
            'prostockminimo' => 2,
            'propreciocompra' => 50.5,
            'idTipoproducto' => 2,
            'idUnidadmedida' => 3,
        ]);

        Producto::create([
            'pronombre' => 'Mangeras de incendio',
            'prodescripcion' => 'Mangera para extintor',
            'prostock' => 30,
            'prostockminimo' => 2,
            'propreciocompra' => 50.5,
            'idTipoproducto' => 2,
            'idUnidadmedida' => 3,
        ]);

    }
}
