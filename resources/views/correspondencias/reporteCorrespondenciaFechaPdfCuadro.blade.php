<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de correspondencia</title>
    <style>
        * {
            font-size: 12px;
        }
        img {
            width: 200px;
            position: absolute
        }
        table{
            width: 100%;

        }
        td{
            height: 60px;
        }
        table,th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        h1{
            text-align: center;
            font-size: 14px;
        }
        .firma{
            width: 200px;
        }
    </style>
</head>
<body>
    <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
    <h1>MINISTERIO DE SALUD</h1>
    <h1>DIRECCION DE SALUD AMBIENTAL</h1><br>
    <h1>CONTROL Y SEGUIMIENTO DE CORRESPONDENCIA</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>FECHA DE INGRESO</th>
                <th>PROCEDENCIA</th>
                <th>EXTRACTO</th>
                <th>MARGINADO A</th>
                <th>OBSERVACIONES</th>
                <th class="firma">FECHA Y FIRMA DE RECEPCION</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($correspondencias as $correspondencia)
            <tr>
                <td>{{$correspondencia->id}}</td>
                <td>{{$correspondencia->fecha}}</td>
                <td>{{$correspondencia->procedencia}}</td>
                <td>{{$correspondencia->extracto}}</td>
                <td>{{$correspondencia->usuario1->nombres}} {{$correspondencia->usuario1->apellidos}}</td>
                <td>{{$correspondencia->observaciones}}</td>
                <td class="firma"></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>