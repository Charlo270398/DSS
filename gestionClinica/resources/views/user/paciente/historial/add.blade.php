
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir Entrada</title>
</head>

<html>
    
    <br>
    <div class="container">
      <h2>Añadir entrada al historial de <strong> <?php echo $usuario->nombre . ' '. $usuario->apellidos ?> </strong></h2>
      <form action="{{action('EntradasController@addEntrada')}}" method="POST" class="was-validated">
      {{ csrf_field() }}
      {{ method_field('POST') }}
        <br>
        <div class="form-group">
          <label for="nombre" class="mr-sm-2">Asunto:</label>
          <input style="width:50%" type="text" class="form-control" id="asunto" placeholder="Introduzca un asunto" name="asunto" required>
        </div>
        
        <div class="form-group">
          <label for="nombre" class="mr-sm-2">Descripción:</label>
          <textarea style="width:50%" type="text" class="form-control" id="descripcion" placeholder="Introduzca una descripción" name="descripcion" rows="3" required></textarea>
        </div>
        <input type="hidden" class="form-control" id="paciente_id" value="<?php echo $usuario->id ?>" placeholder="Introduzca una descripción" name="paciente_id" required>
        <br>
        <button type="submit" class="btn btn-primary">Añadir entrada</button>

      </form>
    </div>


</html>
@stop
