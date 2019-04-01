
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Médicos</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div>
             <h2>Listado de médicos</h2>
        </div>      
        <div>
                
            <ol>
            <h4>Buscar médico:</h4>
            <input id="myInput" type="text" name="inputMedico" placeholder="Busca por nombre">
            <button onclick="window.location.href='/medicos' + getInput()" type="submit"> Buscar </button>
            </ol>
        </div>
        
        <div>
            

                <?php 
                    if (count($medicos)!=0){
                        foreach($medicos as $key=>$value): ?>
                        <ol>
                    <a href="/medicos/<?php echo $value->id;?>">
                         <?php echo ($value->nombre . ' ' . $value->apellidos) ;?>
                    </a> 
                </ol>
                <?php endforeach;}else{?> 
                <h4>Búsqueda sin resultados</h4>
                <?php } ?>
                
            
        </div>
            
            
        </div>   

        {{ $medicos->links() }}
      
        
        
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

