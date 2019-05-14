
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editor Clinica</title>
</head>
<!<link href="/css/form.css" rel="stylesheet">
<html>
    <body>
        <div class ="formDivHeader">
            <h2>Editor de clínica</h2>
        </div>
        <br>


    </body>

    <form action="{{action('ClinicaController@editarClinica')}}" method="POST" class="was-validated">
    {{ csrf_field() }}
    {{ method_field('POST') }}
  <div class="form-inline">
    <label for="id" class="mr-sm-2">Id: </label>
    <input type="text" class="form-control" id="id" placeholder="La id no deberia ser modificada" value="<?php echo $clinica->id?>" name="id" required>

  </div><br>
  <div class="form-inline">
    <label for="nombre" class="mr-sm-2">Nombre:</label>
    <input type="text" class="form-control" id="nombre" placeholder="Ponga el nombre" value="<?php echo $clinica->nombre?>" name="nombre" required>

  </div><br>
  <div class="form-inline">
    <label for="direccion" class="mr-sm-2">Dirección:</label>
    <input type="text" class="form-control" id="uname" placeholder="Escriba la dirección" value="<?php echo $clinica->direccion?>" name="direccion" required>

  </div><br>
  <div class="form-inline">
    <label for="fecha_inauguracion" class="mr-sm-2">Fecha inauguración:</label>
    <input type="text" class="form-control" id="uname" placeholder="2015-10-10 10:10:10" value="<?php echo $clinica->fecha_inauguracion?>" name="fecha_inauguracion" required>
  </div><br>

  <div class="form-inline">
      Acepta para confirmar cambios<input class="form-check-input" type="checkbox" name="remember" required>.
  </div><br>
  <button type="submit" class="btn btn-primary">Guardar</button> <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/usuario'" >Salir</button>

</form>




</html>
@stop

