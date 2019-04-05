
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
            <h2>Añadir DEPARTAMENTO</h2>
        </div>
        <br>

        <form action="{{action('MedicosController@addMedico')}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class = "formDiv">
                <p><strong>dni:</strong> <input type="inputText" name="dni"></p>
                <p><strong>Nombre:</strong> <input type="inputText" name="nombre"></p>
                <p><strong>Contraseña:</strong> <input type="inputText" name="pass"></p>
                <p><strong>apellidos:</strong> <input type="inpuText" name="apellidos"> </p>
                <p><strong>e-mail:</strong> <input type="inpuText" name="email"> </p>
                <p><strong>fecha nacimiento:</strong> <input type="inpuText" name="fecha_nacimiento"> </p>
                <p><strong>num colegiado:</strong> <input type="inpuText" name="num_colegiado"> </p>
                <p><button type="submit">Añadir</button> <button type="button" data-dismiss="modal" onclick="window.location.href='/usuario/1'">Salir</button></p>
            </div>
        </form>
    </body>



</html>
@stop
