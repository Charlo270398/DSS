
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Médicos</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div>
             <h2>Listado de médicos</h2>
        </div>      
        <div>
            <input  id="myInput" type="text" name="inputMedico" placeholder="Busca por nombre">
        </div>  
    </body>
</html>
@stop

