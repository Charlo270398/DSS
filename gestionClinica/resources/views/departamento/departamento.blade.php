
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $departamento->nombre; ?></title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <br>
    <div>
        <img class = "depImages" src='<?php echo $departamento->imagen;?>'>
    </div>
    <header>
         <h2>Departamento de <?php echo $departamento->nombre; ?></h2>
    </header>
    <body>
        <br>
        <br>
        <div class="listDivContainer">
            <h2>Lista de Médicos:</h2>
            <?php 
                if (count($medicos)!=0){
                    foreach($medicos as $key=>$value): ?>
                    <ol>
                        <a href="/medicos/<?php echo $value->id;?>">
                        <?php 
                            if($value->departamento_id == $departamento->id)
                                echo ($value->apellidos . ', ' . $value->nombre) ;
                        ?>
                        </a> 
                    </ol>
            <?php endforeach;}else{?> 
            <?php } ?>
        </div>
        <br>
        {{ $medicos->links() }}
    </body>
</html>
@stop

