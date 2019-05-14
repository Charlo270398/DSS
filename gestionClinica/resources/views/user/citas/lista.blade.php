
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historial</title>
</head>

<?php function meses($num){
    switch($num){
        case '01':
            return 'Enero';
        case '02':
            return 'Febrero';
        case '03':
            return 'Marzo';
        case '04':
            return 'Mayo';
        case '05':
            return 'Abril';
        case '06':
            return 'Junio';
        case '07':
            return 'Julio';
        case '08':
            return 'Agosto';
        case '09':
            return 'Septiembre';
        case '10':
            return 'Octubre';
        case '11':
            return 'Noviembre';
        default:
            return 'Diciembre';
    }
}?>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <br> 
        <div class="container">
            <h1>Citas registradas</h1>
            <div>
                <a href="/citas&antiguas">Fecha ascendente</a>
                <a href="/citas&recientes">Fecha descendente</a>
            </div>
            <br> 
            <div class="container">
                <?php 
                if (count($citas)!=0){ ?>
            
                    <table class="table table-bordered">
                        <thead class="tableHeader">
                            <tr>
                            <th>Día</th>
                            <th>Hora</th>
                            <th>Paciente</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citas as $c){ ?>
                                <tr>
                                    <td> <?php echo (substr($c->fecha, 8, 2) . ' de ' . meses(substr($c->fecha, 5, 2)) . ' de ' . substr($c->fecha, 0, 4))  ?> </td>
                                    <td> <?php echo substr($c->fecha, -8, -3) ?> </td>
                                    <td> <?php echo($c->paciente_id) ?> </td>
                                    <td> 
                                        <button class="btn btn-primary ">Ver cita</button> 
                                        <button class="btn btn-danger ">Cancelar cita</button> 
                                    </td>
                                </tr> 
                            <?php }  ?> 
                        </tbody>
                    </table>
              
                <?php }else{ ?> 
                    <h4>Sin citas pendientes</h4>
                <?php } ?>     
                        
                            
                                   
            </div>
        </div>
    </body>
</html>
@stop

