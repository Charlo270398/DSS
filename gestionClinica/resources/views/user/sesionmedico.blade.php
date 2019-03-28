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
<link href="/css/lists.css" rel="stylesheet">
<html>
<body>
    <ol>
        <div class = "text">
            <h2>Formulario de Acceso</h2>
        </div>
    </ol>
        <form id="form-login" action="#" method="post" >
            <h3><p><label for="nombre">Usuario:</label></p></h3>
                <input name="nombre" type="text" id="nombre" class="nombre" placeholder="Pon tu usuario" autofocus=""/ ></p>
            <h3><p><label for="pass">Contraseña:</label></p></h3>
                <input name="pass" type="password" id="pass" class="pass" placeholder="Pon tu contraseña"/ ></p>
            <p><input name="submit" type="submit" id="boton" value="Entrar" class="boton"/></p>
        </form>
</body>
</html>
@stop