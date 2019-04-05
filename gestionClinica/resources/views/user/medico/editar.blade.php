
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
<link href="/css/form.css" rel="stylesheet">
<html>
    <body>
        <div class ="formDivHeader">
            <h2>EDITAR MÉDICO</h2>
        </div>
        <br>

        <form action="{{action('MedicosController@editarMedico')}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class = "formDiv">
                <p><strong>ID:</strong> <input type="inputText" name=id value="<?php echo $medico->id?>" ></p>
                <p><strong>dni:</strong> <input type="inputText" name="dni" value="<?php echo $medico->dni?>" ></p>
                <p><strong>Nombre:</strong> <input type="inputText" name="nombre" value="<?php echo $medico->nombre?>"></p>
                <p><strong>Contraseña:</strong> <input type="inputText" name="pass" value="<?php echo $medico->pass?>"></p>
                <p><strong>apellidos:</strong> <input type="inpuText" name="apellidos" value="<?php echo $medico->apellidos?>"> </p>
                <p><strong>e-mail:</strong> <input type="inpuText" name="email" value="<?php echo $medico->email?>"> </p>
                <p><strong>fecha nacimiento:</strong> <input type="inpuText" name="fecha_nacimiento" value="<?php echo $medico->fecha_nacimiento?>"> </p>
                <p><strong>num colegiado:</strong> <input type="inpuText" name="num_colegiado" value="<?php echo $medico->num_colegiado?>" > </p>
                <p><button type="submit">Editar</button> <button type="button" data-dismiss="modal" onclick="window.location.href='/usuario/1'">Salir</button></p>
            </div>
        </form>
    </body>



</html>
@stop
