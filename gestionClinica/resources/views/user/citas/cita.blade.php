
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Información sobre la cita</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <header>
        <h2>Información sobre la cita</h2>
    </header>
    <body>
        <br>
        <br>
        <div class = "listDivContainer">
            <p><strong>Médico: </strong><?php echo $medico->nombre . ' ' . $medico->apellidos; ?></p>
            <p><strong>Departamento:</strong> <a href= '/departamentos/<?php echo $medico->departamento_id?>'><?php echo $departamento->nombre?></a></p>
            <p><strong>Motivo de la consulta:</strong> <?php echo $cita->motivo?></p>
            <p><strong>Horario de la consulta: </strong> <?php echo $cita->fecha ?></p>
            <p><strong>Box:</strong> <?php echo  ('nº ' . $cita->box_id)?></p>
            <p>
               
                <a class="btn btn-danger" href="/home"> Cancelar cita </a>
                <a class="btn btn-success" href='/usuario/<?php echo ($cita->paciente_id)?>/citas&recientes'> Volver </a>
            </p>
        </div>
       
    </body>
    
</html>
@stop

