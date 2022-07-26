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
            width: 120px;
        }
        .observacion{
            height: 165px;
            margin-left: 0;
        }
        .extracto{
            margin-left: 0;
            height: 85px;
        }
        table{
            width: 400px;
            border: 2px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
        }
        b{
            margin-left:0;
        }
        .direccion{
            margin-left: 85px; 
        }
        .espacio{
            margin-left: 150px;
        }
        .cheque{
            background: black;
            width: 8px;
            height: 8px;
            margin: 1px;
        }
        .td-cheque{
            width: 10px; 
        }
        .td-observacion{
            height: 30px;
        }
        .urgente{
            font-size: 14px;
            text-align: center;
            height: 20px;
        }
        .footer{
            font-size: 14px;
            font-style: italic;
        }
        .encabezado{
            max-height: 90px;
            min-height: 90px;
        }
    </style>
</head>

<body>
    <img src="{{env('APP_URL')}}/sistema_disam/public/img/logo.jpg">
    <label>MINISTERIO DE SALUD</label><br>
    <label class="direccion">DIRECCION DE SALUD AMBIENTAL</label>
    <table>
        <tr>
            <td colspan="4">
                <div class="encabezado">
                    <b>FECHA:</b> {{$correspondencias->fecha}}<label class="espacio">&nbsp;</label><b>HORA:</b> {{$correspondencias->hora}}<br><br>
                    <b>MARGINADO A:</b> 
                    @if($correspondencias->id_usuario != null){{$correspondencias->usuario1->nombres}} {{$correspondencias->usuario1->apellidos}}@endif
                    @if($correspondencias->id_usuario_dos != null), {{$correspondencias->usuario2->nombres}} {{$correspondencias->usuario2->apellidos}}@endif
                    @if($correspondencias->id_usuario_tres != null), {{$correspondencias->usuario3->nombres}} {{$correspondencias->usuario3->apellidos}}@endif
                    @if($correspondencias->id_usuario_cuatro != null), {{$correspondencias->usuario4->nombres}} {{$correspondencias->usuario4->apellidos}}@endif
                    <br><br>
                    <b>PROCEDENCIA:</b> {{$correspondencias->procedencia}}
                </div>
            </td>
        </tr>
        <tr>
            <td class="urgente" colspan="4">
                <b>{{$correspondencias->urgencia}}</b>
            </td>
        </tr>
        <tr>
            <td><b>PARA TRAMITE RESPECTIVO</b></td>
            <td class="td-cheque">@if($correspondencias->opcion1) <div class="cheque"></div> @endif</td>
            <td><b>ASISTIR SEGUN AGENDA</b></td>
            <td class="td-cheque">@if($correspondencias->opcion2) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td><b>PREPARAR RESPUESTA</b></td>
            <td class="td-cheque">@if($correspondencias->opcion3) <div class="cheque"></div> @endif</td>
            <td><b>ATENDER MARGINADO</b></td>
            <td class="td-cheque">@if($correspondencias->opcion4) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td><b>PARA SU CONOCIMIENTO</b></td>
            <td class="td-cheque">@if($correspondencias->opcion5) <div class="cheque"></div> @endif</td>
            <td><b>PARA SU CONCIDERACION</b><br><b>EN EL PROCESO</b></td>
            <td class="td-cheque">@if($correspondencias->opcion6) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td><b>DELEGAR E INFORMAR</b> </td>
            <td class="td-cheque">@if($correspondencias->opcion7) <div class="cheque"></div> @endif</td>
            <td><b>PARA LOS EFECTOS</b><br><b>PERTINENTES</b></td>
            <td class="td-cheque">@if($correspondencias->opcion8) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td><b>SU ATENCION Y SEGUIMIENTO</b> </td>
            <td class="td-cheque">@if($correspondencias->opcion9) <div class="cheque"></div> @endif</td>
            <td><b>PARA ANEXARLO A</b><br><b>EXPEDIENTE</b></td>
            <td class="td-cheque">@if($correspondencias->opcion10) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td><b>PARA SU OPINION TECNICA</b> </td>
            <td class="td-cheque">@if($correspondencias->opcion11) <div class="cheque"></div> @endif</td>
            <td><b>ATENDER PETICION</b></td>
            <td class="td-cheque">@if($correspondencias->opcion12) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td rowspan="2"><b>COORDINAR CON QUIEN</b><br><b>CORRESPONDA E INFORMAR</b> </td>
            <td rowspan="2">@if($correspondencias->opcion13) <div class="cheque"></div> @endif</td>
            
            <td><b>INVESTIGAR, ANALIZAR Y</b><br><b>PREPARAR RESPUESTA</b></td>
            <td class="td-cheque">@if($correspondencias->opcion14) <div class="cheque"></div> @endif</td>
        </tr>
        <tr>
            <td><b>ASISTIR E INFORMAR</b></td>
            <td class="td-cheque">@if($correspondencias->opcion15) <div class="cheque"></div> @endif</td>
        </tr>

        <tr>
            <td colspan="4">
                <b>EXTRACTO - {{$correspondencias->id}}: </b><br>
                <div class="extracto">
                    {{$correspondencias->extracto}}<br><br>
                </div>
                <b>OBSERVACIONES: </b>
                <div @if ($correspondencias->observacion != null) class="observacion" @endif>
                    {{$correspondencias->observacion}}
                </div> 
            </td>
        </tr>

        @if ($correspondencias->observacion == null)
            <tr><td class="td-observacion" colspan="4"></td></tr>
            <tr><td class="td-observacion" colspan="4"></td></tr>
            <tr><td class="td-observacion" colspan="4"></td></tr>
            <tr><td class="td-observacion" colspan="4"></td></tr>
            <tr><td class="td-observacion" colspan="4"></td></tr>
        @endif
        
    </table>
    
    <h2 class="footer">
        @foreach ($director as $direc)
            {{strtoupper($direc->nombres)}}  {{strtoupper($direc->apellidos)}}
        @endforeach
        <br>DIRECTOR DE SALUD AMBIENTAL
    </h2>
</body>
</html>