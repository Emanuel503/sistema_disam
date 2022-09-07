<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de correspondencia</title>
    <style>
        * {
            margin-top: 7px;
            margin-left: 7px;
            margin-right: 14px;
            font-size: 12px;
        }
        .observacion{
            height: 115px;
            
        }
        table{
            width: 55%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        b{
            margin-left:0;
            margin-right:3px;  
        }
        
        img {
            width: 120px;
        }
        .direccion{
            margin-left: 110px; 
        }
        .cuadro{
            border: 1px solid black;
        }
        .espacio{
            margin-left: 150px;
        }
        .text-center{
            text-align: center;
        }
        .cheque{
            border: 1px solid black;
            background: black;
            width: 5px;
            height: 5px;
            margin: 1px;
        }
        .td-cheque{
            width: 10px;
            padding: 2px;
        }
        .td-observacion{
            height: 20px;
        }
        .urgente{
            font-size: 14px;
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
                <b>FECHA:</b> {{$correspondencias->fecha}}<label class="espacio">&nbsp;</label><b>HORA:</b> {{$correspondencias->hora}}<br><br>
                <b>MARGINADO A:</b> {{$correspondencias->usuarios->nombres}} {{$correspondencias->usuarios->apellidos}}<br><br>
                <b>PROCEDENCIA:</b> {{$correspondencias->fecha}}
            </td>
        </tr>
        <tr>
            <td class="text-center urgente" colspan="4">
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

        <tr class="observacion">
            <td colspan="4">
                <b>EXTRACTO: </b><br>
                {{$correspondencias->extracto}}<br><br>

                <b>OBSERVACIONES: </b><br><br>
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
</body>
</html>