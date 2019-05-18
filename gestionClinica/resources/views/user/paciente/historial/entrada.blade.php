
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Información sobre la Entrada</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div class = "container">
            <br>
            <h2><strong>HISTORIAL MÉDICO</strong></h2>
            <br>
            <p></strong>Paciente:</strong> <?php echo $usuario->nombre . ' ' . $usuario->apellidos; ?></p>
            <p><strong>Fecha de la Entrada:</strong> <?php echo substr(($historial->fecha), 0, -9); ?></p>
            <p><strong>Asunto: </strong> <?php echo $historial->asunto ; ?></p>
            <p><strong>Descripción: </strong> <?php echo $historial->descripcion ; ?></p>
            <p><a class="btn btn-success" href='/historial&recientes'> Volver </a></p>
        </div>
    </body>
</html>
@stop