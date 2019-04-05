
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<?php
    if($op == 'borrar'){
        $ruta = '/borrar';
        $header = 'Borrar Médico';
    }else if($op == 'editar'){
        $ruta = '/editar';
        $header = 'Editar Médico';
    }else{
        $ruta = '';
        $header = 'Listado de Médicos';
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Médicos</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <header>
        <h2>Listado de médicos</h2>
    </header>
    <body>
        <br>
        <div class="listDivContainer">
            <ol>
                <h4>Buscar médico:</h4>
                <input id="myInput" type="text" name="inputMedico" placeholder="Busca por nombre o apellidos">
                <button onclick="window.location.href='/medicos' + getInput()" type="submit"> Buscar </button>
            </ol>
        </div>
        <br>
        <div class="listDivContainer">
                <?php
                    if (count($medicos)!=0){

                        foreach($medicos as $key=>$value): ?>
                        <ol>
                    <a href="/medicos/<?php echo ($value->id. $ruta);?>">
                         <?php  echo ($value->apellidos . ', ' . $value->nombre) ;?>

                    </a>
                </ol>
                <?php endforeach;}else{?>
                <h4>Búsqueda sin resultados</h4>
                <?php } ?>
        </div>

        <br>

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

