<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Permisos</title>
    <style>
        .contenedor {
            width: 45%;
            height: auto;
            border: 1px solid #000;
            padding: 3px;
        }

        img {
            width: 70px;
            position: absolute;
            margin-left: 5px;
            margin-top: 5px;
        }

        #id {
            margin-right: 0;
        }

        .header-texto p {
            font-size: 12px;
            margin: 0;
            text-align: center;
            font-weight: bold;
        }

        .body p {
            font-size: 11px;
            font-weight: bold;
            margin: 3px;
        }

        p {
            font-size: 11px;
        }
    </style>
</head>


<body>
    @php
    $dependencia = "";
    $cargoAutoriza = "";

    foreach($reporte as $r){
    $dependencia = $r->nombre;
    }
    foreach($cargo as $c){
    $cargoAutoriza = $c->tipo_coordinacion;
    }
    @endphp

    <div class="contenedor">
        <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
        <div id="header">
            <div class="header-texto">
                <p>Ministerio de Salud</p>
                <p>Dirección de Salud Ambiental</p>
                <p>Control de permisos</p>
            </div>
        </div>
        <div class="body">
            <p>Código de marcación&nbsp; ____________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Correlativo&nbsp; ________</p>
            <p>Area/Unidad: &nbsp; {{$dependencia}} </p>
            <p>Nombre: {{$permisos->usuario->nombres}} {{$permisos->usuario->apellidos}}</p>

            <p>Tiene licencia para presentarse a sus labores:</p>
            <p>{{$permisos->licencia->tipo_permiso}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total tiempo: {{$permisos->tiempo_dia}} dia/s {{$permisos->tiempo_horas}} hora/s {{$permisos->tiempo_minutos}} minuto/s</p>
            <p>Fecha y hora de entrada: {{$permisos->fecha_entrada}} {{$permisos->hora_entrada}}</p>

            <p>Tiene licencia para retirarse de sus labores:</p>
            <p>Fecha y hora de salida: {{$permisos->fecha_salida}} {{$permisos->hora_salida}}</p>
            <p>Motivo: {{$permisos->motiv->motivo}}</p>
            <p>Lugar y fecha: El Salvador, {{$permisos->fecha_permiso}}</p>

            <br>

            <p>F:_________________________ </p>
            <p>Nombre: {{$permisos->usuarioAuto->nombres}} {{$permisos->usuarioAuto->apellidos}} </p>
            <p>Cargo: {{$cargoAutoriza}}</p>
            <p>Sello del Jefe que autoriza:</p>

            <br>
        </div>

        <p>NOTA: Este formulario aplica para permisos hasta 5 días.</p>

    </div><br><br>

    <div class="contenedor">
        <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
        <div id="header">
            <div class="header-texto">
                <p>Ministerio de Salud</p>
                <p>Dirección de Salud Ambiental</p>
                <p>Control de permisos</p>
            </div>
        </div>
        <div class="body">
            <p>Código de marcación&nbsp; ____________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Correlativo&nbsp; ________</p>
            <p>Area/Unidad: &nbsp; {{$dependencia}} </p>
            <p>Nombre: {{$permisos->usuario->nombres}} {{$permisos->usuario->apellidos}}</p>

            <p>Tiene licencia para presentarse a sus labores:</p>
            <p>{{$permisos->licencia->tipo_permiso}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total tiempo: {{$permisos->tiempo_dia}} dia/s {{$permisos->tiempo_horas}} hora/s {{$permisos->tiempo_minutos}} minuto/s</p>
            <p>Fecha y hora de entrada: {{$permisos->fecha_entrada}} {{$permisos->hora_entrada}}</p>

            <p>Tiene licencia para retirarse de sus labores:</p>
            <p>Fecha y hora de salida: {{$permisos->fecha_salida}} {{$permisos->hora_salida}}</p>
            <p>Motivo: {{$permisos->motiv->motivo}}</p>
            <p>Lugar y fecha: El Salvador, {{$permisos->fecha_permiso}}</p>

            <br>

            <p>F:_________________________ </p>
            <p>Nombre: {{$permisos->usuarioAuto->nombres}} {{$permisos->usuarioAuto->apellidos}} </p>
            <p>Cargo: {{$cargoAutoriza}}</p>
            <p>Sello del Jefe que autoriza:</p>

            <br>
        </div>

        <p>NOTA: Este formulario aplica para permisos hasta 5 días.</p>

    </div>

</body>

</html>