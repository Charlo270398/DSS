
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<link href="/css/menus.css" rel="stylesheet">
<html>
    <body>
        <div class = "title">
            <h2>Panel de administrador</h2>
        </div>
        <br>
        <div>
            <ul>    <h4>Clínica: <a href="/clinica/edit"> Editar </a>    </h4></ul>
            <ul>    <h4>Departamentos:  <a href="/departamento/add"> Añadir </a> <a href="/departamento/edit"> Editar </a> <a href="/departamento/delete"> Borrar </a>    </h4></ul>
            <ul>    <h4>Boxes: <a href="/box/edit"> Añadir </a> <a href="/box/delete"> Borrar </a>    </h4></ul>
            <ul>    <h4>Medicos: <a href="/medico/add"> Dar de alta </a> <a href="/medico/edit"> Editar </a>  <a href="/medico/delete"> Borrar </a>   </h4></ul>
        </div>
    </body>
</html>
@stop

