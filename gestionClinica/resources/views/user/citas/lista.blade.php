
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
    <header>
        <h2>Citas registradas</h2>
    </header> 
    <body>
        <br> 
        <div class="listDivContainer">
            <a href="/usuario/<?php echo $user->id;?>/citas&antiguas">Fecha ascendente</a>
            <a href="/usuario/<?php echo $user->id;?>/citas&recientes">Fecha descendente</a>
        </div>
        <br> 
        <div class="listDivContainer">
            <h4 style="text-align:left"> Fecha de la cita </h4>
                <?php 
                    if (count($citas)!=0){
                       
                        foreach($citas as $key=>$value): ?>
                        <ol>
                    <a href="/usuario/<?php echo $user->id;?>/citas/<?php echo $value->id;?>">
                         <?php  echo substr(($value->fecha), 0, -9); ; ?>
                    </a> 
                </ol>
                <?php endforeach;}else{?> 
                <h4>Sin citas pendientes</h4>
                <?php } ?>   
        </div>
            
        <br>

    
      
        
        
    </body>
</html>
@stop

