
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
    <title>Información sobre la Entrada</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div class = "container">
            <br>
            <h2><strong>Datos de la entrada</strong></h2>
            <br>
            <p><strong>Escrita por:</strong> <?php echo $medico->nombre . ' ' . $medico->apellidos; ?></p>
            <p><strong>Fecha de la entrada:</strong> <?php echo (substr($entrada->fecha, 0, 2) . ' de ' . $x->meses(substr($entrada->fecha, 3, 2)) . ' de ' . substr($entrada->fecha, 6, 4)) . ' a las ' . substr($entrada->fecha, 10, 6) ?> </p>
            <p><strong>Asunto: </strong> <?php echo $entrada->asunto ; ?></p>
            <p><strong>Descripción: </strong> <?php echo $entrada->descripcion ; ?></p>
            <p><a class="btn btn-success" href='/historial&recientes'> Volver </a></p>
        </div>
    </body>
</html>
@stop