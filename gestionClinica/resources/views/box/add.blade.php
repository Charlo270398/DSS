
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

<html>
    <body>
        <div class ="formDivHeader">
            <h2>Añadir box</h2>
        </div>
        <br>
    </body>
    <form action="{{action('BoxController@addBox')}}" method="POST" class="was-validated">
    {{ csrf_field() }}
    {{ method_field('POST') }}
  <div class="form-inline">
    <label for="id" class="mr-sm-2">Id: </label>
    <input type="text" class="form-control" id="id" placeholder="No repetir id"  name="id" required>
    <div class="invalid-feedback">No repetir id.</div>
  </div><br>
  <div class="form-inline">
    <label for="numero" class="mr-sm-2">Número:</label>
    <input type="text" class="form-control" id="numero" placeholder="48" name="numero" required>
    <div class="invalid-feedback">No repetir numero.</div>

  </div><br>
  <div class="form-inline">
    <label for="clinica_id" class="mr-sm-2">Clínica id:</label>
    <input type="text" class="form-control" id="clinica_id" placeholder="1"  name="clinica_id" required>
    <div class="invalid-feedback">Solo hay una clinica 1.</div>
  </div><br>

  <div class="form-inline">
      Acepta para confirmar cambios <input class="form-check-input" type="checkbox" name="remember" required>
  </div>
  <button type="submit" class="btn btn-primary">Añadir</button> <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/usuario'" >Salir</button>

</form>



</html>
@stop

