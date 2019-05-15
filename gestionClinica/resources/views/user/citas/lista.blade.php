
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <?php use App\Util; $x = new Util(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historial</title>
</head>

<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <br> 
        <div class="container">
            <h1>Citas registradas</h1>
            <div>
                <a href="/citas&antiguas">Antiguas</a>
                <a href="/citas&recientes">Recientes</a>
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
                            <th>Médico</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;
                                foreach ($citas as $c){ ?>
                                <tr>
                                    <td> <?php echo (substr($c->fecha, 8, 2) . ' de ' . $x->meses(substr($c->fecha, 5, 2)) . ' de ' . substr($c->fecha, 0, 4))  ?> </td>
                                    <td> <?php echo substr($c->fecha, -8, -3) ?> </td>
                                    <td> <?php echo($c->paciente_id) ?> </td>
                                    <td> 
                                        <button onclick="window.location.href='citas/<?php echo $c->id ?>'"  class="btn btn-primary ">Ver cita</button> 
                                        <button onclick="window.location.href='citas/<?php echo $c->id ?>/borrar'"  class="btn btn-danger ">Cancelar cita</button> 
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

