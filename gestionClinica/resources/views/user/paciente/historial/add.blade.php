
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
    <br>
    <div class="container">
      <h2>Añadir entrada al historial de <strong> <?php echo $usuario->nombre . ' '. $usuario->apellidos ?> </strong></h2>
      <form action="{{action('DepartamentosController@addDepartamento')}}" method="POST" class="was-validated">
      {{ csrf_field() }}
      {{ method_field('POST') }}
        <br>
        <div class="form-inline">
          <label for="nombre" class="mr-sm-2">Descripción:</label>
          <input type="text" class="form-control" id="texto" placeholder="Introduzca una descripción" name="texto" required>
        </div>
        <input type="hidden" class="form-control" id="id" value="<?php echo $usuario->id ?>" placeholder="Introduzca una descripción" name="id" required>
        <br>
        <button type="submit" class="btn btn-primary">Añadir entrada</button>

      </form>
    </div>


</html>
@stop
