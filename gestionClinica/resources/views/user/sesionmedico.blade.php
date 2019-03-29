@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Médico</title>
</head>

<link href="/css/form.css" rel="stylesheet">
<html>
<body>
    @include('components/formLoging', array('tipo'=>'médico')) <!--Pasamos como parámetro datos sobre si es paciente/médico/admin-->
</body>
</html>
@stop