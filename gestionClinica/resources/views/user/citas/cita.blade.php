
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
  <title>Información sobre la cita</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div class = "container">
            <br>
            <h2><strong>Información sobre la cita</strong></h2>
            <br>
            <p><strong> <?php if($esMedico){ ?>
                Paciente: <?php }else{ ?>
                Médico: <?php } ?> 
            </strong><?php echo $usuario->nombre . ' ' . $usuario->apellidos; ?></p>
            <p><strong>Departamento:</strong> <a href= '/departamentos/<?php echo $usuario->departamento_id?>'><?php echo $departamento->nombre?></a></p>
            <p><strong>Motivo de la consulta:</strong> <?php echo $cita->motivo?></p>
            <p><strong>Día de la consulta: </strong> <?php echo substr($cita->fecha,0,2) . ' de ' . $x->meses(substr($cita->fecha,3,2)) . ' de ' . substr($cita->fecha,6,4) ?></p>
            <p><strong>Hora de la consulta: </strong> <?php echo substr($cita->fecha,11,5) ?></p>
            <p><strong>Box:</strong> <?php echo  ('nº ' . $cita->box_id)?></p>
            <p>
                <a class="btn btn-success" href='/citas&recientes'> Volver </a>
                <?php if($esMedico){ ?>
                <a class="btn btn-primary" href='/historial/add&<?php echo $cita->paciente_id ?>'> Insertar entrada en el historial del paciente </a>    
                <?php } ?>
            </p>
        </div>
       
    </body>
    
</html>
@stop

