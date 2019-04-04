
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
<link href="/css/form.css" rel="stylesheet">
<html>
    <body>
        <div class ="formDivHeader">
            <h2>Editor de departamento</h2>
        </div>
        <br>
        
        <form action="{{action('DepartamentosController@editarDepartamento')}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class = "formDiv">
                <p><strong>Id:</strong> <input type="inputText" name="id" value="<?php echo $departamento->id?>" ></p>
                <p><strong>Nombre:</strong> <input type="inputText" name="nombre" value="<?php echo $departamento->nombre?>" ></p>
                <p><strong>Imagen:</strong> <input type="inpuText" name="imagen" value="<?php echo $departamento->imagen?>"> </p>
                <p><strong>Clinica_id:</strong> <input type="inputText" name="clinica_id" value="<?php echo $departamento->clinica_id?>" ></p>
                <p><button type="submit">Editar</button> <button type="button" data-dismiss="modal" onclick="window.location.href='/usuario/1'">Salir</button></p>
            </div>
        </form>
    </body>

    
    
</html>
@stop

