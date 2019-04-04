
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
            <h2>Añadir box</h2>
        </div>
        <br>
        
        <form action="{{action('BoxController@addBox')}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class = "formDiv">
                <p><strong>Id:</strong> <input type="inputText" name="id"></p>
                <p><strong>Numero:</strong> <input type="inputText" name="numero"></p>
                <p><strong>Clinica_id:</strong> <input type="inpuText" name="clinica_id"> </p>
                <p><button type="submit">Añadir</button> <button type="button" data-dismiss="modal" onclick="window.location.href='/usuario/1'">Salir</button></p>
            </div>
        </form>
    </body>

    
    
</html>
@stop

