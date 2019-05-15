
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
    <title>Citas</title>
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
                            <th><?php echo($perfil) ?></th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;
                                foreach ($citas as $c){ ?>
                                <tr>
                                    <td> <?php echo (substr($c->fecha, 8, 2) . ' de ' . $x->meses(substr($c->fecha, 5, 2)) . ' de ' . substr($c->fecha, 0, 4))  ?> </td>
                                    <td> <?php echo substr($c->fecha, -8, -3) ?> </td>
                                    <td> <?php echo($nombre[$i]->apellidos . ', ' . $nombre[$i]->nombre) ?> </td>
                                    <td> 
                                        <button onclick="window.location.href='citas/<?php echo $c->id ?>'"  class="btn btn-primary ">Ver cita</button> 
                                        <button data-toggle="modal" data-target="#exampleModalCenter" onclick="$rutaModal='citas/<?php echo $c->id ?>/borrar'"   class="btn btn-danger ">Cancelar cita</button> 
                                    </td>
                                </tr> 
                            <?php $i++; }  ?> 
                        </tbody>
                    </table>
              
                <?php }else{ ?> 
                    <h4>Sin citas pendientes</h4>
                <?php } ?>                      
            </div>
        </div>
        <!-- Modal Borrar-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cancelar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres cancelar la cita seleccionada?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Volver</button>
                <button type="button" onclick="window.location.href=$rutaModal" class="btn btn-danger">Cancelar</button>
            </div>
            </div>
        </div>
    </body>
</html>
@stop

