@php
var_dump($permisos)
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de permisos</title>
    <style>
        * {
            margin-top: 7px;
            margin-left: 7px;
            margin-right: 14px;
            font-size: 12px;
        }

        img {
            width: 120px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        td {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        label {
            font-style: bold;
        }

        .leyenda-vobo {
            font-size: 8px;
            margin-left: 7px;
        }

        .leyenda {
            font-size: 8px;
            position: absolute;
            float: right;
            margin-top: 0;
            margin-right: 0px;
        }

        .text-center {
            text-align: center;
        }

        .leyenda-jefe {
            margin-left: 370px;
        }
    </style>
</head>

<body>
    <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg"><br><br>
    <label>REPORTE DE PERMISOS</label><br><br>

    @php
    $nombre = "";
    $dependencia = "";

    foreach($permisos as $permiso){
    $nombre = $permiso->nombres . " " . $permiso->apellidos;
    $dependencia = $permiso->nombre;
    }
    @endphp

    <label>NOMBRE COMPLETO:</label>{{$nombre}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    <label>DEPENDENCIA:</label>{{$dependencia}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    <label>FECHA INICIO:</label>{{$fecha_inicio}} <label>FECHA FINALIZACIÓN:</label>{{$fecha_finalizacion}}<br><br>


    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo permiso</th>
                <th>Motivo</th>
                <th>Usuario autoriza</th>
                <th>Fecha entrada</th>
                <th>Hora entrada</th>
                <th>Fecha salida</th>
                <th>Hora salida</th>
                <th>Fecha permiso</th>
                <th>Días</th>
                <th>Horas</th>
                <th>Minutos</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permisos as $permiso)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$permiso->tipo_permiso}}</td>
                <td>{{$permiso->motivo}}</td>
                @foreach ($coordinadores as $coordinador)
                @if ($coordinador->id_tecnico == $permiso->id_tecnico)
                <td>{{$coordinador->nombres}} {{$coordinador->apellidos}}</td>
                @endif
                @endforeach
                <td>{{$permiso->fecha_entrada}}</td>
                <td>{{$permiso->hora_entrada}}</td>
                <td>{{$permiso->fecha_salida}}</td>
                <td>{{$permiso->hora_salida}}</td>
                <td>{{$permiso->fecha_permiso}}</td>
                <td>{{$permiso->tiempo_dia}}</td>
                <td>{{$permiso->tiempo_horas}}</td>
                <td>{{$permiso->tiempo_minutos}}</td>
                <td>{{$permiso->estado}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="leyenda">Impreso en Oficina de Imprenta, Minsal</p><br><br>
</body>

</html>