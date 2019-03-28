@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Paciente</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<link href="/css/form.css" rel="stylesheet">
<html>
<body>
    <div class = "text">
        <h2>Iniciar sesión como paciente</h2>
    </div>

    @include('components/formLoging', array('tipo'=>'paciente')) <!--Pasamos como parámetro datos sobre si es paciente/médico/admin-->

</body>
</html>
@stop