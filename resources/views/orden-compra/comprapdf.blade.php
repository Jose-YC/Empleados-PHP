<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Orden de Compra</title>
    <style>


        body {
            font-family: Arial, sans-serif;
            margin: 0;

        }

        .venta-container {
            width: 100%;
            margin: 0 auto;
        }

        .venta-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .venta-datos {
            margin-bottom: 20px;
        }

        .venta-datos .dato {
            margin-bottom: 10px;
        }

        .venta-productos {
            margin-bottom: 20px;
        }

        .venta-productos table {
            width: 100%;
            border-collapse: collapse;
        }

        .venta-productos th,
        .venta-productos td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        .venta-total {
            font-weight: bold;
            text-align: right;
        }

        .venta-observaciones {
            margin-top: 20px;
        }

        .conten {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="venta-container">
        <div class="venta-header">
            <h1>Detalle de Compra</h1>
        </div>
        <div class="venta-datos">
            <div class="conten">
                <div class="dato">
                    <span class="dato-label">Vendedor:</span>
                    <span class="dato-valor">{{$compra->Empleado->empnombres}}  {{$compra->Empleado->empapellidop}}</span>
                </div>
                <div class="dato">
                    <span class="dato-label">Fecha:</span>
                    <span class="dato-valor">{{$compra->orcomfecha}} - {{$compra->orcomhora}}</span>
                </div>
            </div>

        </div>
        <div class="venta-productos">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $item)
                        <tr>
                            <td>{{ $item->Producto->pronombre }}</td>
                            <td>{{ $item->dcomcantidad }}{{ $item->Producto->Unidadmedida->umednombre }} </td>
                            <td> S/. {{ $item->dcomunitario }}</td>
                            <td> S/. {{ $item->propreciocompra * $item->dcomunitario }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="venta-total">
            <div>Total: S/. {{$compra->orcomtotal}}</div>

        </div>
        <div class="venta-observaciones">
            <h3>Observaciones:</h3>
        </div>
        <p>{{$compra->orcomdescripcion}}</p>
    </div>
</body>

</html>
