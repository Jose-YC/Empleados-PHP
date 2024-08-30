<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Aprobación de Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 30px;
        }

        h1 {
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            margin-bottom: 15px;
        }

        .producto {
            margin-bottom: 30px;
        }

        .producto .nombre {
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .producto .descripcion {
            font-size: 11pt;
            color: #555;
            margin-bottom: 5px;
        }

        .producto .detalle {
            font-size: 11pt;
            margin-bottom: 5px;
        }

        .firma {
            margin-top: 50px;
            text-align: right;
        }

        .firma .nombre {
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .firma .cargo {
            font-size: 11pt;
        }

        .firma .empresa {
            font-size: 11pt;
        }
    </style>
</head>
<body>

    
    <h1>Solicitud de Aprobación de Producto</h1>

    <p>Estimados(as) Compañeros del area de finanzas,</p>

    <p>Espero que este mensaje le encuentre bien. Me pongo en contacto con usted para solicitar su amable aprobación para la compra de {{$cantidad}} {{$medida->umednombre}} de {{$producto->pronombre}} </p>

    <p> Me complace responder cualquier observacion o duda que quede de
        su parte. Agradezco de antemano su pronta respuesta.</p>
    <p>Por favor, revise los detalles del producto y proporcione su aprobación para proceder con la compra. Agradezco de antemano su pronta respuesta.</p>

    <div class="firma">
        <div class="nombre">{{$usuarios}}</div>
        <div class="cargo">Area: {{$departameno->depnombre}}</div>

    </div>
</body>
</html>
