
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
            <h2>Editor de clínica</h2>
        </div>
        <br>
        
        <form action="{{action('ClinicaController@editarClinica')}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class = "formDiv">
                <p><strong>Id:</strong> <input type="inputText" name="id" value="<?php echo $clinica->id?>" ></p>
                <p><strong>Nombre:</strong> <input type="inputText" name="nombre" value="<?php echo $clinica->nombre?>" ></p>
                <p><strong>Direccion:</strong> <input type="inpuText" name="direccion" value="<?php echo $clinica->direccion?>"> </p>
                <p><strong>Fecha inauguracion:</strong> <input type="inputText" name="fecha_inauguracion" value="<?php echo $clinica->fecha_inauguracion?>" ></p>
                <p><button type="submit">Editar</button> <button type="button" data-dismiss="modal" onclick="window.location.href='/usuario/1'">Salir</button></p>
            </div>
        </form>
    </body>

    
    
</html>
@stop

