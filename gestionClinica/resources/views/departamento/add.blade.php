
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

<html>
    
    <br>
    <br>
    <div class="container">
      <h2>Añadir Departamento</h2>
      <form action="{{action('DepartamentosController@addDepartamento')}}" method="POST" class="was-validated">
      {{ csrf_field() }}
      {{ method_field('POST') }}
        <div class="form-inline">
          <label for="id" class="mr-sm-2">Id: </label>
          <input type="text" class="form-control" id="id" placeholder="No repetir id"  name="id" required>
        </div>
        <br>
        <div class="form-inline">
          <label for="nombre" class="mr-sm-2">Nombre:</label>
          <input type="text" class="form-control" id="nombre" placeholder="Ponga el nombre" name="nombre" required>


        </div><br>
        <div class="form-inline">
          <label for="imagen" class="mr-sm-2">Ruta de la imagen:</label>

          <input type="inpuText" class="form-control" id="imagen" placeholder="/images/departamentos/oncologia.jpg"  name="imagen" required>
        </div>
        <div class="form-inline">
          <input type="hidden" class="form-control" id="clinica_id" placeholder="1"  name="clinica_id" required>
          <div class="invalid-feedback">Solo clinica 1</div>
        </div><br>

        <div class="form-inline">
            Acepta para confirmar cambios<input class="form-check-input" type="checkbox" name="remember" required>.
        </div><br>
        <button type="submit" class="btn btn-primary">Añadir</button> <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/usuario'" >Salir</button>

      </form>
    </div>


</html>
@stop
