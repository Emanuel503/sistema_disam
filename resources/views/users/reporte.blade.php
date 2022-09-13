<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de usarios</title>
    <style>
        * {
            font-size: 12px;
        }
        table{
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        img {
            width: 120px;
        }
    </style>
</head>

<body>
    <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
    <h1>Listado de tecnicos de la DISAM</h1>    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dependencia</th>
            </tr>
        </thead>
       <tbody>
            @foreach ($usuarios as $usuario )
                <tr>
                    <td>{{$usuario->nombres}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{$usuario->dependencia->nombre}}</td>
                </tr>
            @endforeach
       </tbody>
    </table>
</body>
</html>