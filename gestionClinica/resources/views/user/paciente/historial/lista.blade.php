
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
        <h2>Historial clínico</h2>
    </header> 
    <body>
        <br> 
        <div class="listDivContainer">
            <a href="/usuario/<?php echo $user->id;?>/historial&antiguas">Fecha ascendente</a>
            <a href="/usuario/<?php echo $user->id;?>/historial&recientes">Fecha descendente</a>
        </div>
        <br> 
        <div class="listDivContainer">
            <h4 style="text-align:left"> Fecha de la entrada </h4>
                <?php 
                    if (count($entradas)!=0){
                       
                        foreach($entradas as $key=>$value): ?>
                        <ol>
                    <a href="/usuario/<?php echo $user->id;?>/historial/<?php echo $value->id;?>">
                         <?php  echo substr(($value->fecha), 0, -9); ; ?>
                    </a> 
                </ol>
                <?php endforeach;}else{?> 
                <h4>Historial vacío</h4>
                <?php } ?>   
        </div>
            
        <br>

    
      
        
        
    </body>
    <script>
        function getInput(){
            if(document.getElementById("myInput").value != ''){
                return '&' + document.getElementById("myInput").value;
            }else{
                return '';
            }
        }
    </script>
</html>
@stop

