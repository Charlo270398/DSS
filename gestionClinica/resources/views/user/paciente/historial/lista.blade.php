
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
    <title>Historial clínico</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <br> 
        <div class="container">
            <h1><strong>Historial clínico</strong></h1>
            <br>
            <a href="/historial&antiguas">Antiguas</a>
            <a href="/historial&recientes">Recientes</a>

           <br> 
           <br>
           <table class="table table-bordered">
                <thead class="tableHeader">
                <tr>
                    <th>Fecha de la entrada</th>
                    <th>Asunto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <?php 
                    if (count($entradas)!=0){   
                        foreach($entradas as $e): ?>
                        <tbody>   
                            <td> <?php echo (substr($e->fecha, 0, 2) . ' de ' . $x->meses(substr($e->fecha, 3, 2)) . ' de ' . substr($e->fecha, 6, 4)) . ' a las ' . substr($e->fecha, 10, 6) ?> </td>               
                            <td> <?php echo $e->asunto ; ?> </td>
                            <td> <button type="button" onclick="window.location.href='/historial/<?php echo $e->id;?>'" class="btn btn-primary">Ver Entrada</button> </td> 
                        </tbody>
                    <?php endforeach;}else{?> 
                    <h4>Historial vacío</h4>
                <?php } ?> 
            </table>
        </div>
        <br>
    </body>
</html>
@stop

