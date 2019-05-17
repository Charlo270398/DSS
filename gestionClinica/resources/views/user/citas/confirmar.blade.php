
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
            <form action="{{action('CitasController@reservar')}}" method="POST" class="was-validated">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <h1 style="text-align:center">Resumen de la cita</h1>
                <br>
                <br>
                <p><strong>Médico: </strong><?php echo $medico->nombre . ' ' . $medico->apellidos; ?></p>
                <p><strong>Departamento:</strong> <a href= '/departamentos/<?php echo $medico->departamento_id?>'><?php echo $departamento->nombre?></a></p>
                <p><strong>Día de la consulta: </strong> <?php echo substr($cita->fecha,0,2) . ' de ' . $x->meses(substr($cita->fecha,3,2)) . ' de ' . substr($cita->fecha,6,4) ?></p>
                <p><strong>Hora de la consulta: </strong> <?php echo substr($cita->fecha,11,5) ?></p>
                <p><strong>Box:</strong> <?php echo  ('nº ' . $cita->box_id)?> </p>
                <p>
                    <label><strong>Escriba el motivo de la consulta:</strong></label>
                    <input name="motivo" type="text" class="form-control" placeholder="Ejemplo: Consulta rutinaria" aria-label="Motivo" aria-describedby="basic-addon2" required>
                </p>
                <br>
                <input type="hidden" name="idM" value="<?php echo $medico->id?>">
                <input type="hidden" name="idB" value="<?php echo $cita->box_id ?>">
                <input type="hidden" name="fecha" value="<?php echo $cita->fecha ?>">
                <button class="btn btn-success">Confirmar cita</button>
            </form>
        </div>
       
    </body>
    
</html>
@stop

