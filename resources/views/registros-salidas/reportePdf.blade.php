<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de registos de salidas</title>
    <style>
         .{
            font-size: 13px;
        }

        table, th, td{
            border: 1px solid black;
        }

        table{
            border-collapse: collapse;
            width: 100%;
        }

        img{
            width: 120px;
        }
        .leyenda{
            font-size: 8px;
            position: absolute;
            float: right;
            margin-top: 0;
            margin-right: 0px;
        }
    </style>
</head>
<body>
    
    @php
        $nombre = "";
        $dependencia = "";

        foreach ($salidas as $salida) {
            $nombre = $salida->tecnico;
            $dependencia =  $salida->dependencia;
        }
    @endphp
    <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg"><br><br>
    <label>REGISTRO DE SALIDAS</label><br><br>
    <label><b>NOMBRE COMPLETO:</b>&nbsp;&nbsp;&nbsp;{{$nombre}}</label><br>
    <label><b>DEPENDENCIA:</b>&nbsp;&nbsp;&nbsp;{{$dependencia}}</label><br>
    <label><b>FECHA DE INICIO: </b>&nbsp;&nbsp;&nbsp;{{$fecha_inicio}} <b>&nbsp;&nbsp;&nbsp;FECHA FINAL: </b>&nbsp;&nbsp;&nbsp;{{$fecha_final}}</label><br><br>
    <table>
        <thead>
            <tr>
                <th>Lugar</th>
                <th>Fecha</th>
                <th>Hora de incio</th>
                <th>Hora final</th>
                <th>Objetivo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salidas as $salida)
                <tr>
                    <td>{{$salida->lugar}}</td>
                    <td>{{$salida->fecha}}</td>
                    <td>{{$salida->hora_inicio}}</td>
                    <td>{{$salida->hora_final}}</td>
                    <td>{{$salida->objetivo}}</td>
                    <td>{{$salida->estado}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="leyenda">Impreso en Oficina de Imprenta, Minsal</p><br><br>
</body>
</html>