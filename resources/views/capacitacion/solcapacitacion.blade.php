<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Capacitaciones</title>

    <style>
   body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
}

.solicitud {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.titulo {
    text-align: center;
    color: #333;
}

.info-solicitud {
    margin-top: 20px;
}

.info-solicitud p {
    margin: 5px 0;
}

.cuerpo-solicitud {
    margin-top: 40px;
}

.cuerpo-solicitud h2 {
    margin-bottom: 10px;
    color: #555;
}

.cuerpo-solicitud p {
    margin-bottom: 10px;
    color: #333;
}

.cuerpo-solicitud ul {
    list-style: none;
    padding: 0;
}

.cuerpo-solicitud li {
    margin-bottom: 5px;
    color: #333;
}

    </style>
</head>
<body>
    <div class="solicitud">
        <h1 class="titulo">Solicitud de Capacitaciones</h1>
        <div class="info-solicitud">
            <p><strong>Título:</strong>Solicitud de Capacitacion para el area de  {{ $departamenos->depnombre }}</p>
            <p><strong>Fecha inicio:</strong> {{ $capacitacion->capfechainicio }}</p>
            <p><strong>Fecha final:</strong> {{ $capacitacion->capfechafin }}</p>

        </div>
        <div class="cuerpo-solicitud">
            <h2>Detalle de la Solicitud</h2>
            <p>Por medio de la presente, solicito a usted la aprobación para llevar a cabo una capacitación para el area de : {{ $departamenos->depnombre }}, la cual se realizará el día {{ $capacitacion->fecha_capacitacion }} en las instalaciones de nuestra empresa.</p>
            <p>El objetivo de esta capacitación es brindar a nuestros empleados conocimientos y habilidades relevantes para su desarrollo profesional y mejorar la eficiencia en sus funciones.</p>
            <p>Contaremos con la participación de los siguientes empleados:</p>
            <ul>
                @foreach ($asistencias as $asistencia)
                    <li>{{ $asistencia['idEmpleado'] }} |Nombre completo:{{ $asistencia['nombre_completo'] }} - DNI: {{ $asistencia['dni'] }}</li>
                @endforeach
            </ul>
            <p>Quedo a su disposición para proporcionar cualquier información adicional que sea necesaria. Agradezco de antemano su atención y apoyo en esta solicitud.</p>
            <p>Atentamente,</p>
            <p>{{$usuarios}}</p>
        </div>
    </div>
</body>
</html>

