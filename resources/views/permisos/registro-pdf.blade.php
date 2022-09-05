<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Permisos - {{$permisos->usuario->nombres}} {{$permisos->usuario->apellidos}}</title>
    <style>
        .contenedor {
            width: 50%;
            height: 40%;
            border: 1px solid #000;
            padding: 3px;
            position: absolute;
            top: 38px;
        }

        .contenedor2 {
            width: 50%;
            height: 40%;
            border: 1px solid #000;
            padding: 3px;
            position: absolute;
            left: 370px;
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
            font-size: 13px;
            margin: 0;
            text-align: center;
            font-weight: bold;
        }

        .body p {
            font-size: 12px;
            font-weight: bold;
            margin: 4px;
        }

        p {
            font-size: 12px;
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

    //Convertir fechas a formato dia-mes-año
    foreach($reporte as $repo){
    $fechaPermiso = $repo->fecha_permiso;
    $fechaInicio = $repo->fecha_entrada;
    $fechaFin = $repo->fecha_salida;
    }
    
    $datePermiso = strtotime($fechaPermiso);
    $newformatPermiso = date('m-d-Y',$datePermiso);

    $dateInicio = strtotime($fechaInicio);
    $newformatInicio = date('m-d-Y',$dateInicio);

    $dateFin = strtotime($fechaFin);
    $newformatFin = date('m-d-Y',$dateFin);
    @endphp
    <div class="contenedor">
        <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
        <div id="header">
            <div class="header-texto">
                <p>Ministerio de Salud</p>
                <p>Dirección de Salud Ambiental</p>
                <p>Control de permisos</p>
            </div>
        </div><br>
        <div class="body">
            <p>Código de marcación&nbsp;{{$permisos->usuario->codigo_marcacion}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Correlativo&nbsp; ________</p>
            <p>Area/Unidad: &nbsp; {{$dependencia}} </p>
            <p>Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$permisos->usuario->nombres}} {{$permisos->usuario->apellidos}}</p>

            <p>Tiene licencia para presentarse a sus labores:</p>
            <p>{{$permisos->licencia->tipo_permiso}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total tiempo: {{$permisos->tiempo_dia}} dia/s {{$permisos->tiempo_horas}} hora/s {{$permisos->tiempo_minutos}} minuto/s</p>
            <p>Fecha y hora de entrada: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$newformatInicio}} &nbsp;-&nbsp; {{$permisos->hora_entrada}}</p>

            <p>Tiene licencia para retirarse de sus labores:</p>
            <p>Fecha y hora de salida: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$newformatFin}} &nbsp;-&nbsp; {{$permisos->hora_salida}}</p>
            <p>Motivo: &nbsp;&nbsp;&nbsp;&nbsp;{{$permisos->motiv->motivo}}</p>
            <p>Lugar y fecha:&nbsp;&nbsp;&nbsp;&nbsp; El Salvador, {{$newformatPermiso}}</p>
            <br>

            <p>F:_________________________ </p>
            <p>Nombre: &nbsp;{{$permisos->usuarioAuto->nombres}} {{$permisos->usuarioAuto->apellidos}} </p>
            <p>Cargo: &nbsp;&nbsp;&nbsp;&nbsp; {{$cargoAutoriza}}</p>
            <p>Sello del Jefe que autoriza:</p>
            <br><br>
        </div>

        <p>NOTA: Este formulario aplica para permisos hasta 5 días.</p>

    </div><br><br>

    <div class="contenedor2">
        <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
        <div id="header">
            <div class="header-texto">
                <p>Ministerio de Salud</p>
                <p>Dirección de Salud Ambiental</p>
                <p>Control de permisos</p>
            </div>
        </div><br>
        <div class="body">
            <p>Código de marcación&nbsp;{{$permisos->usuario->codigo_marcacion}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Correlativo&nbsp; ________</p>
            <p>Area/Unidad: &nbsp; {{$dependencia}} </p>
            <p>Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$permisos->usuario->nombres}} {{$permisos->usuario->apellidos}}</p>

            <p>Tiene licencia para presentarse a sus labores:</p>
            <p>{{$permisos->licencia->tipo_permiso}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total tiempo: {{$permisos->tiempo_dia}} dia/s {{$permisos->tiempo_horas}} hora/s {{$permisos->tiempo_minutos}} minuto/s</p>
            <p>Fecha y hora de entrada: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$newformatInicio}} &nbsp;-&nbsp; {{$permisos->hora_entrada}}</p>

            <p>Tiene licencia para retirarse de sus labores:</p>
            <p>Fecha y hora de salida: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$newformatFin}} &nbsp;-&nbsp; {{$permisos->hora_salida}}</p>
            <p>Motivo: &nbsp;&nbsp;&nbsp;&nbsp;{{$permisos->motiv->motivo}}</p>
            <p>Lugar y fecha:&nbsp;&nbsp;&nbsp;&nbsp; El Salvador, {{$newformatPermiso}}</p>
            <br>

            <p>F:_________________________ </p>
            <p>Nombre: &nbsp;{{$permisos->usuarioAuto->nombres}} {{$permisos->usuarioAuto->apellidos}} </p>
            <p>Cargo: &nbsp;&nbsp;&nbsp;&nbsp; {{$cargoAutoriza}}</p>
            <p>Sello del Jefe que autoriza:</p>
            <br><br>
        </div>

        <p>NOTA: Este formulario aplica para permisos hasta 5 días.</p>

    </div>
</body>

</html>