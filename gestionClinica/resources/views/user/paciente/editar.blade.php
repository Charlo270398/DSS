
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
<html>
<style>
div.hidden {
  display: none;
}
</style>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Cambiar datos</title>
            </head>
            <html>
            <br>
            <br>
            <header style="text-align: center">
                <h1><strong>Datos de  <?php echo $paciente->nombre?> <?php echo $paciente->apellidos?></strong></h1>
            </header>
            <body>
                <?php
                if($error!=''){ ?>
                    <div class="container">
                            <div class="alert alert-danger" role="alert">
                                <?php  echo $error  ?>
                            </div>
                    </div>
                <?php } ?>

                <div class="container">
                <form action="{{action('UsuarioController@editarPaciente')}}" method="POST" class="was-validated">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                  <div class="hidden">
                  <label for="dni" class="hidden">DNI:</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Dni" value="<?php echo $paciente->dni?>" name="dni" required>


                </div><br>





                <div class="hidden" >
          <label for="id" class="hidden">Id: </label>
          <input type="text" visibility="hidden" class="form-control" id="id" placeholder="La id no deberia ser modificada" value="<?php echo $paciente->id?>" name="id" required>
          </div><br>
                <div class="form-group">
                  <label for="nombre" class="mr-sm-2">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Ponga el nombre" value="<?php echo $paciente->nombre?>" name="nombre" required>

                </div><br>
                <div class="form-group">
                  <label for="apellidos" class="mr-sm-2">Apellidos:</label>
                  <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" value="<?php echo $paciente->apellidos?>" name="apellidos" required>
                </div><br>
                <div class="form-group">
                  <label for="password" class="mr-sm-2">Nueva contraseña:</label>
                  <input id="password" class="form-control" name="password" type="password" pattern="^\S{4,50}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Debe tener 4 caracteres' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Nueva contraseña" required>


                </div><br>
                <div class="form-group">
                  <label for="password_confirm" class="mr-sm-2">Repetir contraseña:</label>
                  <input id="password_two" class="form-control" name="password_two" type="password" pattern="^\S{4,50}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Repita su nueva contraseña' : '');" placeholder="Repita su nueva contraseña" required>


                </div><br>







                <div class="form-group">
                  <label for="email" class="mr-sm-2">E-mail:</label>
                  <input type="email" class="form-control" id="email" placeholder="tucorreo@gmail.com" value="<?php echo $paciente->email?>" name="email" required>
                </div><br>

                <br>
                <button type="submit" class="btn btn-primary">Guardar</button> <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/usuario'" >Salir</button>

              </form>
            </div>



        </html>


@stop
