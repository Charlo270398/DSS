
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir Médico</title>
</head>

<html>
    <br>
    <br>
    <div class = "container">
      <h2>Añadir médico</h2>
      <form action="{{action('MedicosController@addMedico')}}" method="POST" class="was-validated">
      {{ csrf_field() }}
      {{ method_field('POST') }}
        <div class="form-inline">
          <label for="departamento_id" class="mr-sm-2">Id: </label>
          <input type="text" class="form-control" id="departamento_id" placeholder="La id no deberia ser modificada"  name="departamento_id" required>
          </div><br>

          <div class="form-inline">
          <label for="dni" class="mr-sm-2">DNI:</label>
          <input type="text" class="form-control" id="dni" placeholder="Dni"  name="dni" required>


        </div><br>
        <div class="form-inline">
          <label for="nombre" class="mr-sm-2">Nombre:</label>
          <input type="text" class="form-control" id="nombre" placeholder="Ponga el nombre"  name="nombre" required>

        </div><br>
        <div class="form-inline">
          <label for="password" class="mr-sm-2">Pass:</label>
          <input type="text" class="form-control" id="password" placeholder="Escriba nueva pass"  name="password" required>

        </div><br>

        <div class="form-inline">
          <label for="apellidos" class="mr-sm-2">Apellidos:</label>
          <input type="text" class="form-control" id="apellidos" placeholder="Apellidos"  name="apellidos" required>
        </div><br>
        <div class="form-inline">
          <label for="email" class="mr-sm-2">E-mail:</label>
          <input type="text" class="form-control" id="email" placeholder="No repetir email"  name="email" required>
        </div><br>
        <div class="form-inline">
          <label for="fecha_nacimiento" class="mr-sm-2">Fecha nacimiento:</label>
          <input type="text" class="form-control" id="fecha_nacimiento" placeholder="2015-10-10 10:10:10"  name="fecha_nacimiento" required>
        </div><br>
        <div class="form-inline">
          <label for="num_colegiado" class="mr-sm-2">Numero colegiado:</label>
          <input type="text" class="form-control" id="num_colegiado" placeholder="No repetir"  name="num_colegiado" required>
        </div><br>
        <div class="form-inline">
            Acepta para confirmar cambios<input class="form-check-input" type="checkbox" name="remember" required>.
        </div><br>
        <button type="submit" class="btn btn-primary">Guardar</button> <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/usuario'" >Salir</button>

      </form>
    </div>

</html>
@stop
