<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadosFinanciero;

use App\Models\TipoComprobanteVenta;
use App\Models\TipoPago;
class FinanzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadosFinanciero::create([
            'esfitipo' => 'Estado 1',
        ]);
        EstadosFinanciero::create([
            'esfitipo' => 'Estado 2',
        ]);
        TipoPago::create([
            'tpagotipo' => 'Efectivo',
        ]);
        TipoPago::create([
            'tpagotipo' => 'Tarjeta',
        ]);
        TipoPago::create([
            'tpagotipo' => 'Cheque',
        ]);
        TipoPago::create([
            'tpagotipo' => 'Transferencia',
        ]);
        TipoPago::create([
            'tpagotipo' => 'Deposito',
        ]);
        TipoPago::create([
            'tpagotipo' => 'Otro',
        ]);
        TipoComprobanteVenta::create([
            'tcomcomprobante' => 'Factura',
        ]);
        TipoComprobanteVenta::create([
            'tcomcomprobante' => 'Boleta',
        ]);
        TipoComprobanteVenta::create([
            'tcomcomprobante' => 'Nota de Crédito',
        ]);
        TipoComprobanteVenta::create([
            'tcomcomprobante' => 'Nota de Débito',
        ]);
        TipoComprobanteVenta::create([
            'tcomcomprobante' => 'Factura Electrónica',
        ]);
        TipoComprobanteVenta::create([
            'tcomcomprobante' => 'Boleta Electrónica',
        ]);
        //combusitble
    }
}
