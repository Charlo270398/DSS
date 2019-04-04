
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
            <h2>Añadir Departamento</h2>
        </div>
        <br>

        <form action="{{action('DepartamentosController@addDepartamento')}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class = "formDiv">
                <p><strong>Id:</strong> <input type="inputText" name="id"></p>
                <p><strong>Nombre:</strong> <input type="inputText" name="nombre"></p>
                <p><strong>Ruta de la imagen:</strong> <input type="inputText" name="imagen"></p>
                <p><strong>Clinica_id:</strong> <input type="inpuText" name="clinica_id"> </p>
                <p><button type="submit">Añadir</button> <button type="button" data-dismiss="modal" onclick="window.location.href='/usuario/1'">Salir</button></p>
            </div>
        </form>
    </body>



</html>
@stop
