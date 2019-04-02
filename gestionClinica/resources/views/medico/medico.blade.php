
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $medico->nombre; ?></title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div>
            <h2><?php echo $medico->nombre . ' ' . $medico->apellidos; ?></h2>
        </div>
        <br>
        <div class = "listdiv">
            <h2 class = "h3">Ficha del doctor</h2>
            <br>
            <p><strong>Número de colegiado:</strong> <?php echo $medico->num_colegiado?></p>
            <p><strong>Departamento:</strong> <a href= "/departamentos/<?php echo $departamento->departamento_id?>"><?php echo $departamento->nombre?></a></p>
            <p><strong>Email:</strong> <?php echo $medico->email?></p>
        </div>
    </body>
    
</html>
@stop

