
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editor Departamento</title>
</head>

<html>
    <body>
        <div class ="formDivHeader">
            <h2>Editor de departamento</h2>
        </div>
        <br>


    </body><br>
    <form action="{{action('ClinicaController@editarClinica')}}" method="POST" class="was-validated">
    {{ csrf_field() }}
    {{ method_field('POST') }}
  <div class="form-inline">
    <label for="id" class="mr-sm-2">Id: </label>
    <input type="text" class="form-control" id="id" placeholder="Del 1 a 6" value="<?php echo $departamento->id?>" name="id" required>

  </div><br>
  <div class="form-inline">
    <label for="nombre" class="mr-sm-2">Nombre:</label>
    <input type="text" class="form-control" id="nombre" placeholder="Ponga el nombre" value="<?php echo $departamento->nombre?>" name="nombre" required>

  </div><br>
  <div class="form-inline">
    <label for="imagen" class="mr-sm-2">Dirección:</label>
    <input type="text" class="form-control" id="uname" placeholder="/images/departamentos/fisioterapia.jpg" value="<?php echo $departamento->imagen?>" name="imagen" required>

  </div><br>
  <div class="form-inline">
    <label for="clinica_id" class="mr-sm-2">Clinica id:</label>
    <input type="text" class="form-control" id="uname" placeholder="1" value="<?php echo $departamento->clinica_id?>" name="clinica_id" required>
  </div><br>

  <div class="form-inline">
      Acepta para confirmar cambios<input class="form-check-input" type="checkbox" name="remember" required>.
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button> <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/usuario'" >Salir</button>

</form>



</html>
@stop

