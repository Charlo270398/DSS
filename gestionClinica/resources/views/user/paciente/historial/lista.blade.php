
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
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <br> 
        <div class="container">
            <h1><strong>Historial clínico</strong></h1>
            <br>
            <a href="/historial&antiguas">Fecha ascendente</a>
            <a href="/historial&recientes">Fecha descendente</a>

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
                        foreach($entradas as $key=>$value): ?>
                        <tbody>   
                            <td> <?php  echo substr(($value->fecha), 0, -9); ; ?> </td>  
                            <td> <?php echo $value->asunto ; ?> </td>
                            <td> <button type="button" onclick="window.location.href='/usuario/<?php echo $user->id;?>/historial/<?php echo $value->id;?>'" class="btn btn-primary">Ver Entrada</button> </td>
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

